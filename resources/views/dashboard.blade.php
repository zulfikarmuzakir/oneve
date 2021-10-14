<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                    <div><img src="{{ Auth::user()->avatar }}" alt=""></div>
                    <p>{{ Auth::user()->name }}</p>
                    @if (Auth::user()->membership->where('user_id', Auth::user()->id)->orderByDesc('created_at')->first()->membership_type === "premium" &&
                    Auth::user()->membership->where('user_id', Auth::user()->id)->orderByDesc('created_at')->first()->expire_at > date('Y-m-d'))
                        <p class="bg-yellow-500 text-white rounded py-2 px-4">Premium</p>
                        <p>Kamu adalah seorang pengguna premium</p>
                    @else
                        <p>Kamu bukan pengguna premium</p>
                    @endif
                    <br>
                    @if (Auth::user()->membership->where('user_id', Auth::user()->id)->orderByDesc('created_at')->first()->membership_type === "premium" && 
                    Auth::user()->membership->where('user_id', Auth::user()->id)->orderByDesc('created_at')->first()->expire_at > date('Y-m-d'))
                        <a class="bg-blue-500 text-white hover:bg-blue-700 py-2 px-4 rounded" href="{{ route('user.stoppremium', ['id' => Auth::user()->membership->where('user_id', Auth::user()->id)->orderByDesc('created_at')->first()->id ]) }}">Stop premium</a>

                    @else
                        <a class="bg-indigo-500 text-white hover:bg-indigo-700 py-2 px-4 rounded" href="{{ route('user.joinpremium', ['id' => Auth::user()->membership->where('user_id', Auth::user()->id)->orderByDesc('created_at')->first()->id ]) }}">Join premium</a>
                    @endif

                <div class="navigation">
                    <br>
                    <a class="bg-green-500 hover:bg-green-700 text-white  py-2 px-4 rounded" href="{{ route('create.event') }}">Create event</a>
                    <br> <br>
                    <a class="bg-red-500 hover:bg-red-700 text-white  py-2 px-4 rounded" href="{{ route('list.event') }}">List event</a>

                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
