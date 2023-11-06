<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('All users') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Products</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td>
                      <div>{{ $user->email }}</div>
                      <div>Edit |
                        <button id="{{ $user->id }}" type="button" class="p-0 btn my-button" data-bs-toggle="modal" data-bs-target="#myModal" data-username="{{ $user->name }}">
                          Delete
                        </button> |

                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Modal Heading</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>

                              <!-- Modal body -->
                              <div class="modal-body">
                                Are you sure you want to delete this  {{ $user->name }}?
                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                <form action="{{ route('delete-user.destroy', $user->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2" data-bs-dismiss="modal">Yes, I'm sure</button>
                                </form>
                                <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" data-bs-dismiss="modal">No, cancel</button>
                              </div>

                            </div>
                          </div>
                        </div>

                        <script>
                            // When the modal is shown
                            $('#myModal').on('show.bs.modal', function (event) {
                              const button = $(event.relatedTarget); // Button that triggered the modal
                              const username = button.data('username'); // Get the username from the button's data-username attribute
                              const modal = $(this);

                              // Set the modal title and content based on the username
                              modal.find('.modal-title').text('Delete User');
                              modal.find('.modal-body').html(`Are you sure you want to delete this ${username}?`);
                            });
                        </script>



                        <span>View</span>
                      </div>
                  </td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->role }}</td>
                  <td>{{ $user->products->count() }}</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Products</th>
                </tr>
              </tfoot>
            </table>
            @if ($users->hasPages())
            <div class="pt-10">
                {{ $users->links() }}
            </div>
            @endif
          </div>
        </div>
    </div>
  </div>
</x-app-layout>
