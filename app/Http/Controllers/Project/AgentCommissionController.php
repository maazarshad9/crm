<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\User;
use Illuminate\Http\Request;

class AgentCommissionController extends Controller
{
	public function storeCommission(Request $request, Project $project, User $agent)
	{
		$agent = $project->members()->wherePivot('member_id', $agent->id)->first();
		if ($request->booking_commission) {
			$agent->projects()->updateExistingPivot($project, ['booking_commission' => $request->booking_commission]);
		}
		if ($request->allocation_commission) {
			$agent->projects()->updateExistingPivot($project, ['allocation_commission' => $request->allocation_commission]);
		}
		if ($request->confirmation_commission) {
			$agent->projects()->updateExistingPivot($project, ['confirmation_commission' => $request->confirmation_commission]);
		}

		return redirect()->back();
	}
}
