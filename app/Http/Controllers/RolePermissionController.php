<?php

namespace App\Http\Controllers;

use App\Models\Role;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RolePermissionController extends Controller
{
    /**
     * Affiche la vue pour affecter des permissions à un rôle.
     *
     * @param int $roleId
     * @return \Illuminate\View\View
     */
    public function index($roleId)
    {
        $role = Role::find($roleId);
        if (!$role) {
            abort(404);
        }
        $permissions = Permission::all();
        return view('roles.assign-permissions', compact('role', 'permissions'));
    }
    /**
     * Affecte les permissions sélectionnées à un rôle donné.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $roleId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function assign(Request $request, $roleId)
    {
        $role = Role::findById($roleId);
        if (!$role) {
            abort(404);
        }
        $permissions = $request->input('permissions', []);
        $role->syncPermissions($permissions);
        return redirect()->route('roles.index')
            ->with('success', 'Les permissions ont été affectées au rôle.');
    }
}
