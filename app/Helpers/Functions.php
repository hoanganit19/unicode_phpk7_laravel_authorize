<?php
function isRole($group, $module, $role = 'view'){

    if (!empty($group->permissions)){
        $permissionData = $group->permissions;

        if (!empty($permissionData)){
            $permissionArr = json_decode($permissionData, true);

            if (!empty($permissionArr[$module]) && in_array($role, $permissionArr[$module])){
                return true;
            }
        }
    }


    return false;
}
