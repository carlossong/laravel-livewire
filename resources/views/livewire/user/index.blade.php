<div>
    <table class="min-w-full divide-y divide-gray-200 w-full">
        <thead>
        <tr>
            <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                ID
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nome
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Email
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Perfil
            </th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Ações
            </th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($users as $user)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $user->id }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $user->name }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $user->email }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    @foreach ($user->roles as $role)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            {{ $role->title }}
                        </span>
                    @endforeach
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <a href="{{ route('users.edit', $user->id) }}" class="px-2 inline-flex text-xl leading-5 font-semibold rounded-md icon-pencil-square-o"></a>
                    @can('user_delete')
                        <button class="px-2 inline-flex text-xl leading-5 font-semibold rounded-md text-red-500 icon-trash-o" type="button" wire:click="deleteConfirm({{ $user->id }})" wire:loading.attr="disabled"></button>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="p-2">
        {{ $users->links() }}
    </div>
</div>
