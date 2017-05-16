<?php

namespace App\Http\Controllers\Open;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;

use App\Repository\Status\StatusRepositoryInterface as StatusRepository;

class DateController extends Controller
{
    /**
     * @var StatusRepository
     */
    protected $statusRepository;

    /**
     * AccountController constructor.
     *
     * @param StatusRepository  $statusRepository
     */
    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    public function show(User $user, string $date)
    {
        $statuses = $this->statusRepository->openUserStatusesByDate($user, $date);

        return view('open.date')->with(compact('user',  'statuses', 'date'));

    }
}
