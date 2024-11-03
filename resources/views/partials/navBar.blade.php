<div class="flex flex-row justify-between items-center">
    <div class="font-bold text-lg">
        <h1>Task-app</h1>
    </div>
    <ul class="flex flex-row items-center mb-3 md:mb-0">
        <li class="pr-5">
            <div class="relative id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification">
                <div class="absolute left-0 top-0  bg-red-500 rounded-full">
@if (Auth::User()->unreadNotifications()->count() > 0)
                    <span class="text-sm text-white p-1">{{ Auth::User()->unreadNotifications()->count()  }}</span>

@endif                </div>
                <div class="p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gray-600 w-6 h-6"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                    </svg>
                </div>
            </div>
            <!-- Dropdown menu -->
            <div id="dropdownNotification"
                class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow-xl dark:bg-gray-800 dark:divide-gray-700"
                aria-labelledby="dropdownNotificationButton">
                <div
                    class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white">
                    Notifications
                </div>
                <div class="divide-y divide-gray-100 dark:divide-gray-700 ">

                    @foreach (Auth::User()->unreadNotifications as $notification )
                        <a href="{{ route('task.show',['task'=> $notification->data['task_id'] ]) }}" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">

                        <div class="w-full pl-3">
                            <span
                                    class="font-semibold inline-block text-gray-900 dark:text-white">{{ $notification->data['name'] }}</span>
                                     <span
                                    class="font-semibold inline-block text-gray-900 dark:text-white">{{ $notification->data['message'] }}</span>

                            <div class="text-xs text-blue-600 dark:text-blue-500">{{ $notification->created_at->diffForHumans() }}</div>
                        </div>
                    </a>
                    @endforeach
                </div>
                <a href="#"
                    class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
                    <div class="inline-flex items-center ">
                        <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                            <path
                                d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                        </svg>
                        View all
                    </div>
                </a>

            </div>
        </li>
        <li class="md:mr-5 py-2 md:py-0"><a href="#" class="hover:text-gray-400">Mon compte</a></li>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="md:mr-5 py-2 md:py-0" type="submit">Déconnexion</button>
            <li><a href="" class="hover:text-gray-400"></a></li>
        </form>
    </ul>
 </div>
