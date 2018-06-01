<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;
use Application\Entity\Role;
use Zend\Http\Request;
use Application\Authorization\Exception\UnAuthorizedException;

/**
 * RoleController
 *
 * @author R.A. Soffner
 *
 * @version 1.0.0
 *
 */
class RoleController extends AbstractActionController
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
        if (!$this->isAllowed('role', 'role_admin')) {
            throw new UnAuthorizedException('You have no access to the admin environment');
        }
        
        return new ViewModel([
            'roles' => $this->em->getRepository('Application\Entity\Role')->findAll(),
        ]);
    }
    
    public function addAction()
    {
        if (!$this->isAllowed('role', 'role_admin')) {
            throw new UnAuthorizedException('You have no access to the admin environment');
        }
        
        /**
         * 
         * @var Request $request
         */
        $request = $this->getRequest();
        
        if (! $request->isPost()) {
            $parents = $this->em->getRepository('Application\Entity\Role')->findAll();
            
            return new ViewModel([
               'parents' => $parents, 
            ]);
        }
        
        $role = new Role();
        
        $role->setRoleId($request->getPost('roleId'));
        $parent = $this->em->find('Application\Entity\Role', $request->getPost('parent'));
        $role->setParent($parent);
        $this->em->persist($role);
        $this->em->flush();
        
        return $this->redirect()->toRoute('admin/role', ['action' => 'index']);
        
    }
    
    
    public function editAction()
    {
        if (!$this->isAllowed('role', 'role_admin')) {
            throw new UnAuthorizedException('You have no access to the admin environment');
        }
        
        $id = $this->params()->fromRoute('id', null);
        
        try {
            /**
             *
             * @var Role $role
             */
            $role = $this->em->find('Application\Entity\Role', $id);
        } catch (\Exception $e) {
            return $this->redirect()->toRoute('admin/role', ['action' => 'index']);
        }
        
        /**
         *
         * @var Request $request
         */
        $request = $this->getRequest();
        
        if (! $request->isPost()) {
            
            $parents = $this->em->getRepository('Application\Entity\Role')->findAll();
            
            return new ViewModel([
                'role' => $role,
                'parents' => $parents,
            ]);
            
        }
        
        $parent = $this->em->find('Application\Entity\Role', $request->getPost('parent'));
        $role->setParent($parent);
        
        $this->em->persist($role);
        $this->em->flush();
        
        return $this->redirect()->toRoute('admin/role', ['action' => 'index']);
    }
    
}