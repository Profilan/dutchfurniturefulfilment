<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;
use Zend\Http\Request;
use Application\Entity\User;
use Admin\Service\HtpasswdService;
use Zend\Crypt\Password\Bcrypt;
use ZfcUser\Options\UserServiceOptionsInterface;
use Application\Entity\Url;
use Application\Authorization\Exception\UnAuthorizedException;

/**
 * UserController
 *
 * @author R.A. Soffner
 *
 * @version 1.0
 *
 */
class UserController extends AbstractActionController
{
    /**
     * 
     * @var EntityManager
     */
    protected $em;
    
    /**
     * 
     * @var HtpasswdService
     */
    protected $htpasswdService = NULL;
    
    /**
     * 
     * @var UserServiceOptionsInterface
     */
    protected $options;
    
    /**
     * 
     * @param EntityManager $em
     * @param HtpasswdService $htpasswdService
     * @param UserServiceOptionsInterface $options
     */
    public function __construct(EntityManager $em, $htpasswdService, UserServiceOptionsInterface $options)
    {
        if (null === $this->em) {
            $this->em = $em;
        }
        
        if (null === $this->htpasswdService) {
            $this->htpasswdService = $htpasswdService;
        }
        
        if (null === $this->options) {
            $this->options = $options;
        }
        
    }
    
    /**
     * The default action - show the home page
     */
    public function indexAction()
    {
        if (!$this->isAllowed('user', 'user_admin')) {
            throw new UnAuthorizedException('You have no access to the admin environment');
        }
        
        $users = [];
        
        return new ViewModel([
            'users' => $this->em->getRepository('Application\Entity\User')->findAll(),
        ]);
    }
    
    public function addAction()
    {
        if (!$this->isAllowed('user', 'user_admin')) {
            throw new UnAuthorizedException('You have no access to the admin environment');
        }
        
        /**
         *
         * @var Request $request
         */
        $request = $this->getRequest();
        
        if (! $request->isPost()) {
            
            $urls = $this->em->getRepository('Application\Entity\Url')->findAll();
            $roles = $this->em->getRepository('Application\Entity\Role')->findAll();
            
            return new ViewModel([
                'urls' => $urls,
                'roles' => $roles,
            ]);
            
        }
        
        $bcrypt = new Bcrypt();
        $bcrypt->setCost($this->options->getPasswordCost());
        
        $user = new User();
        
        $date = new \DateTime();
        
        $user->setUsername($request->getPost('username'));
        $user->setApikey($request->getPost('apikey'));
        $user->setDebcode($request->getPost('debcode'));
        $user->setEnabled($request->getPost('enabled') == 'on');
        $user->setDisplayName($request->getPost('displayName'));
        $user->setEmail($request->getPost('email'));
        $user->setPassword($bcrypt->create($request->getPost('password')));
        $user->setSysCreated($date);
        
        if ($request->getPost('url', null) != null) {
            foreach ($request->getPost('url') as $key => $value) {
                $url = $this->em->find('Application\Entity\Url', $key);
                
                $user->getUrls()->add($url);
            }
        }
        
        if ($request->getPost('role', null) != null) {
            foreach ($request->getPost('role') as $key => $value) {
                $role = $this->em->find('Application\Entity\Role', $key);
                $user->getRoles()->add($role);
            }
        }
        
        $this->em->persist($user);
        $this->em->flush();
        
        $this->htpasswdService->addUser($request->getPost('username'), $request->getPost('password'));
        
        return $this->redirect()->toRoute('admin/user', ['action' => 'index']);
    }
    
    public function editAction()
    {
        if (!$this->isAllowed('user', 'user_admin')) {
            throw new UnAuthorizedException('You have no access to the admin environment');
        }
        
        $id = (int) $this->params()->fromRoute('id', 0);
        
        try {
            /**
             * 
             * @var User $user
             */
            $user = $this->em->find('Application\Entity\User', $id);
            $urls = $this->em->getRepository('Application\Entity\Url')->findAll();
            $roles = $this->em->getRepository('Application\Entity\Role')->findAll();
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('admin/user', ['action' => 'index']);
        }
        
        /**
         * 
         * @var Request $request
         */
        $request = $this->getRequest();
        
        if (! $request->isPost()) {
            
            return new ViewModel([
                'user' => $user,
                'urls' => $urls,
                'roles' => $roles,
            ]);
            
        }
        
        $date = new \DateTime();
        
        $user->setUsername($request->getPost('username'));
        $user->setEmail($request->getPost('email'));
        $user->setApikey($request->getPost('apikey'));
        $user->setDebcode($request->getPost('debcode'));
        $user->setEnabled($request->getPost('enabled') == 'on');
        $user->setDisplayName($request->getPost('displayName'));
        if ($user->getSysCreated() == null) {
            $user->setSysCreated($date);
        }
        $user->setSysModified($date);
        
        // First empty the current urls from the user
        $user->getUrls()->clear();
        // Then add the new urls to the user
        foreach ($request->getPost('url') as $key => $value) {
            /**
             * 
             * @var Url $url
             */
            $url = $this->em->find('Application\Entity\Url', $key);
            $user->getUrls()->add($url);
        }
        
        // First empty the current roles from the user
        $user->getRoles()->clear();
        // Then add the new roles to the user
        foreach ($request->getPost('role') as $key => $value) {
            $role = $this->em->find('Application\Entity\Role', $key);
            $user->getRoles()->add($role);
        }
        
        $this->em->persist($user);
        $this->em->flush();
        
        return $this->redirect()->toRoute('admin/user', ['action' => 'index']);
    }
    
    public function deleteAction()
    {
        if (!$this->isAllowed('user', 'user_admin')) {
            throw new UnAuthorizedException('You have no access to the admin environment');
        }
        
        $id = (int) $this->params()->fromRoute('id', 0);
        
        try {
            /**
             *
             * @var User $user
             */
            $user = $this->em->find('Application\Entity\User', $id);
            $username = $user->getUsername();
            
            /**
             *
             * @var Request $request
             */
            $request = $this->getRequest();
            
            if (! $request->isPost()) {
                return new ViewModel([
                    'user' => $user,
                ]);
            }
            
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('admin/user', ['action' => 'index']);
        }
        
        // First delete the related items from this user
        $user->getRoles()->clear();
        $user->getUrls()->clear();
        
        $this->em->remove($user);
        $this->em->flush();
        
        $this->htpasswdService->deleteUser($username);
        
        return $this->redirect()->toRoute('admin/user', ['action' => 'index']);
    }
    
    
    public function changepasswordAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        
        try {
            /**
             *
             * @var User $user
             */
            $user = $this->em->find('Application\Entity\User', $id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('admin/user', ['action' => 'index']);
        }
        
        /**
         *
         * @var Request $request
         */
        $request = $this->getRequest();
        
        if (! $request->isPost()) {
            
            return new ViewModel([
                'user' => $user,
            ]);
            
        }
        
        $date = new \DateTime();
        
        $bcrypt = new Bcrypt();
        $bcrypt->setCost($this->options->getPasswordCost());
        
        $user->setPassword($bcrypt->create($request->getPost('password')));
        if ($user->getSysCreated() == null) {
            $user->setSysCreated($date);
        }
        $user->setSysModified($date);
        
        $this->em->persist($user);
        $this->em->flush();
        
        $this->htpasswdService->updateUser($user->getUsername(), $request->getPost('password'));
        
        return $this->redirect()->toRoute('admin/user', ['action' => 'index']);
        
    }
}