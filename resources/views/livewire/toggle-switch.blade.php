<div>
    <div class="font-sans antialiased text-gray-900 mt-8">
        <div class="flex flex-col items-center pt-5 pb-5 sm:justify-center">
            <h2 class="text-2xl font-bold uppercase">Toggle Switch to Database</h2>

            <div class="w-full px-6 py-8 mt-6 mb-6 overflow-hidden bg-white shadow-md sm:max-w-xl sm:rounded-lg">
                <div>
                  @if(session()->has('message'))
                  <div class="px-3 py-2 mb-2 text-center text-white bg-green-600 rounded"  x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                    {{ session('message') }}
                </div>
                  @endif
                    <form wire:click.prevent='save' class="pb-10 border-b-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="title">
                                Full Name
                            </label>
                            <input  type="text" wire:model='name'
                                class="w-full py-2 pl-2 pr-4 mt-2 text-sm border border-gray-400 rounded-lg sm:text-base focus:outline-none focus:border-blue-400" />
                            @error('name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="flex items-center mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                Add Post
                            </button>

                        </div>
                    </form>
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-sm leading-4 tracking-wider text-left border-b-2 border-gray-300">
                                    Name</th>
                                <th
                                    class="px-6 py-3 text-sm leading-4 tracking-wider text-left border-b-2 border-gray-300">
                                    Status</th>
                                    <th
                                    class="px-6 py-3 text-sm leading-4 tracking-wider text-left border-b-2 border-gray-300">
                                    Action</th>

                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($names as $post)
                            <tr>
                                <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap border-b border-gray-500">
                                    {{ $post->name }}</td>
                                    <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap border-b border-gray-500">
                                        {{ $post->status==1 ? 'Active' : 'Inactive' }}</td>
                                <td class="px-6 py-4 text-sm leading-5 whitespace-no-wrap border-b border-gray-500">
                                    <label  class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" {{ $post->status == 1 ? 'checked' : '' }} class="sr-only peer" wire:click='status({{ $post->id}} ,{{ $post->status}})'>
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    </label>
                                </td>
                            </tr>
                            @empty
                <tr>
                    <td colspan="4"
                        class="px-6 py-4 leading-5 text-center whitespace-no-wrap border-b border-gray-500">No
                        Records</td>

                </tr>
                             @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <p class="text-gray-500">Developer Sheriff Gaye &copy; 2022</p>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>

