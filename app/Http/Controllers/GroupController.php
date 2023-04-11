<?php

namespace App\Http\Controllers;

use App\Http\Moysklad;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function addToMs()
    {
        $groups = Group::all();

        $ms = new Moysklad();
        foreach ($groups as $group) {
            if ($group->groupId == null) {
                $data = [
                    'name' => $group->name
                ];
                $msGroup = $ms->addGroup($data);
                if ($msGroup != null) {
                    $group->groupId = $msGroup->id;
                    $group->save();
                }
            }
        }

        return view('add-to-ms');

    }
}
