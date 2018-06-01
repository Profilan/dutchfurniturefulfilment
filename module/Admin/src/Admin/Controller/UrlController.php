<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;
use Application\Entity\Url;
use Zend\Http\Request;
use Application\Authorization\Exception\UnAuthorizedException;

/**
 * UrlController
 *
 * @author R.A. Soffner
 *
 * @version 1.0.0
 *
 */
class UrlController extends AbstractActionController
{
    protected $em;
    
    /**
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        if (null === $this->em) {
            $this->em = $em;
        }
    }
    
    /**
     * The default action - show the home page
     */
    public function indexAction()
    {
        if (!$this->isAllowed('url', 'url_admin')) {
            throw new UnAuthorizedException('You have no access to the admin environment');
        }
        
        return new ViewModel([
            'urls' => $this->em->getRepository('Application\Entity\Url')->findAll(),
        ]);
    }
    
    public function addAction()
    {
        if (!$this->isAllowed('url', 'url_admin')) {
            throw new UnAuthorizedException('You have no access to the admin environment');
        }
        
        /**
         * 
         * @var Request $request
         */
        $request = $this->getRequest();
        
        if (! $request->isPost()) {
            return new ViewModel();
        }
        
        $url = new Url();
        
        $url->setUrlName($request->getPost('urlName'));
        $this->em->persist($url);
        $this->em->flush();
        
        return $this->redirect()->toRoute('admin/url', ['action' => 'index']);
        
    }
    
    public function editAction()
    {
        if (!$this->isAllowed('url', 'url_admin')) {
            throw new UnAuthorizedException('You have no access to the admin environment');
        }
        
        $id = (int) $this->params()->fromRoute('id', 0);
        
        try {
            /**
             *
             * @var Url $role
             */
            $url = $this->em->find('Application\Entity\Url', $id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('admin/url', ['action' => 'index']);
        }
        
        /**
         *
         * @var Request $request
         */
        $request = $this->getRequest();
        
        if (! $request->isPost()) {
            
            return new ViewModel([
                'url' => $url,
            ]);
            
        }
        
        $role->setUrlName($request->getPost('urlName'));
        
        $this->em->persist($role);
        $this->em->flush();
        
        return $this->redirect()->toRoute('admin/url', ['action' => 'index']);
    }
    
}