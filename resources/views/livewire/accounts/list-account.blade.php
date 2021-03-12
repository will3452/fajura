<div class="m-2 shadow w-full rounded p-2 pt-6 max-w-6xl">
    <h1 class="px-6 text-left text-xl font-bold">Account management <a href="" class="bg-green-500 p-1 rounded text-white px-2 text-xs">Refresh list ? </a></h1>
    <p class="px-6 text-left text-gray-700 text-sm">Create, Remove and Update accounts.</p>
    <div class="px-6 pb-6">
        <table class="text-left mt-4 p-2 w-full ">
            <thead>
                <tr class="text-gray-700">
                    <th>
                        Email
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Type
                    </th>
                    <td>
                        #
                    </td>
                    <td>
                        #
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                    @livewire('accounts.list-account-item', ['account'=>$account])
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <div class="flex justify-center mt-2">
        <button class="btn btn-blue">Create Account</button>
    </div> --}}
</div>