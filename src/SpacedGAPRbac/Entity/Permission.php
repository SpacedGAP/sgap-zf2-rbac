<?php

namespace SpacedGAPRbac\Entity;

use SpacedGAPRbac\Entity\PermissionAbstract;
use ZfcRbac\Permission\PermissionInterface;

/**
 * Permission
 */
class Permission
    extends PermissionAbstract
    implements PermissionInterface
{
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $permission_roles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->permission_roles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add permissionRole
     *
     * @param \SpacedGAPRbac\Entity\Role $permissionRole
     *
     * @return Permission
     */
    public function addPermissionRole(\SpacedGAPRbac\Entity\Role $permissionRole)
    {
        $this->permission_roles[] = $permissionRole;

        return $this;
    }

    /**
     * Remove permissionRole
     *
     * @param \SpacedGAPRbac\Entity\Role $permissionRole
     */
    public function removePermissionRole(\SpacedGAPRbac\Entity\Role $permissionRole)
    {
        $this->permission_roles->removeElement($permissionRole);
    }

    /**
     * Get permissionRoles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPermissionRoles()
    {
        return $this->permission_roles;
    }
}
