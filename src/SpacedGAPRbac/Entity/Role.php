<?php

namespace SpacedGAPRbac\Entity;

use SpacedGAPRbac\Entity\RoleAbstract;
use Rbac\Role\HierarchicalRoleInterface;
use Doctrine\Common\Collections\Criteria;

/**
 * Role
 */
class Role
    extends RoleAbstract
    implements HierarchicalRoleInterface
{
    /**
     * @var integer
     */
    protected $lft;

    /**
     * @var integer
     */
    protected $rgt;

    /**
     * @var integer
     */
    protected $root;

    /**
     * @var integer
     */
    protected $lvl;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $children;

    /**
     * @var \SpacedGAPRbac\Entity\Role
     */
    protected $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $permissions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $role_users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->permissions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->role_users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set lft
     *
     * @param integer $lft
     *
     * @return Role
     */
    public function setLft($lft)
    {
        $this->lft = $lft;

        return $this;
    }

    /**
     * Get lft
     *
     * @return integer
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * Set rgt
     *
     * @param integer $rgt
     *
     * @return Role
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;

        return $this;
    }

    /**
     * Get rgt
     *
     * @return integer
     */
    public function getRgt()
    {
        return $this->rgt;
    }

    /**
     * Set root
     *
     * @param integer $root
     *
     * @return Role
     */
    public function setRoot($root)
    {
        $this->root = $root;

        return $this;
    }

    /**
     * Get root
     *
     * @return integer
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * Set lvl
     *
     * @param integer $lvl
     *
     * @return Role
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;

        return $this;
    }

    /**
     * Get lvl
     *
     * @return integer
     */
    public function getLvl()
    {
        return $this->lvl;
    }

    /**
     * Add child
     *
     * @param \SpacedGAPRbac\Entity\Role $child
     *
     * @return Role
     */
    public function addChild(\SpacedGAPRbac\Entity\Role $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \SpacedGAPRbac\Entity\Role $child
     */
    public function removeChild(\SpacedGAPRbac\Entity\Role $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Has children
     *
     * @return boolean
     */
    public function hasChildren()
    {
        return (! $this->children->isEmpty());
    }

    /**
     * Set parent
     *
     * @param \SpacedGAPRbac\Entity\Role $parent
     *
     * @return Role
     */
    public function setParent(\SpacedGAPRbac\Entity\Role $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \SpacedGAPRbac\Entity\Role
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add permission
     *
     * @param \SpacedGAPRbac\Entity\Permission $permission
     *
     * @return Role
     */
    public function addPermission(\SpacedGAPRbac\Entity\Permission $permission)
    {
        $this->permissions[] = $permission;

        return $this;
    }

    /**
     * Remove permission
     *
     * @param \SpacedGAPRbac\Entity\Permission $permission
     */
    public function removePermission(\SpacedGAPRbac\Entity\Permission $permission)
    {
        $this->permissions->removeElement($permission);
    }

    /**
     * Get permissions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Has permission
     *
     * @return boolean
     */
    public function hasPermission($permission)
    {
        $criteria = Criteria::create()
            ->where(Criteria::expr()->eq('name', (string) $permission));
        $result   = $this->permissions->matching($criteria);

        return count($result) > 0;
    }

    /**
     * Add roleUser
     *
     * @param \SpacedGAPRbac\Entity\User $roleUser
     *
     * @return Role
     */
    public function addRoleUser(\SpacedGAPRbac\Entity\User $roleUser)
    {
        $this->role_users[] = $roleUser;

        return $this;
    }

    /**
     * Remove roleUser
     *
     * @param \SpacedGAPRbac\Entity\User $roleUser
     */
    public function removeRoleUser(\SpacedGAPRbac\Entity\User $roleUser)
    {
        $this->role_users->removeElement($roleUser);
    }

    /**
     * Get roleUsers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoleUsers()
    {
        return $this->role_users;
    }
}
