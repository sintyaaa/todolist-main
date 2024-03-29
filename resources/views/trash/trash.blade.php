@extends('templates.master')

@section('body')
<div class="overflow-x-auto dark:text-slate-400 ">
    <h1 class="my-6 text-2xl font-semibold">Your Archive To Do List</h1>
    @if (session('status'))
    <div class="toast toast-top toast-end">
        <div class="alert alert-success text-white">
            <svg width="30" height="30" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.49991 0.877045C3.84222 0.877045 0.877075 3.84219 0.877075 7.49988C0.877075 11.1575 3.84222 14.1227 7.49991 14.1227C11.1576 14.1227 14.1227 11.1575 14.1227 7.49988C14.1227 3.84219 11.1576 0.877045 7.49991 0.877045ZM1.82708 7.49988C1.82708 4.36686 4.36689 1.82704 7.49991 1.82704C10.6329 1.82704 13.1727 4.36686 13.1727 7.49988C13.1727 10.6329 10.6329 13.1727 7.49991 13.1727C4.36689 13.1727 1.82708 10.6329 1.82708 7.49988ZM10.1589 5.53774C10.3178 5.31191 10.2636 5.00001 10.0378 4.84109C9.81194 4.68217 9.50004 4.73642 9.34112 4.96225L6.51977 8.97154L5.35681 7.78706C5.16334 7.59002 4.84677 7.58711 4.64973 7.78058C4.45268 7.97404 4.44978 8.29061 4.64325 8.48765L6.22658 10.1003C6.33054 10.2062 6.47617 10.2604 6.62407 10.2483C6.77197 10.2363 6.90686 10.1591 6.99226 10.0377L10.1589 5.53774Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            <h1 class="text-white">{{ session('status') }}</h1>
        </div>
    </div>
    @endif
    <div class="">
        <table class="table rounded-lg">
            <!-- head -->
            <thead>
                <tr>

                    <th class="dark:text-slate-400">Title</th>
                    <th class="dark:text-slate-400">Desctiption</th>
                    @if (Auth::user()->role == 'admin')
                    <th class="dark:text-slate-400">Owner</th>
                    @endif
                    <th class="dark:text-slate-400">Priority</th>
                    <th class="dark:text-slate-400">Status</th>
                    <th class="dark:text-slate-400">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @foreach ($todosAdmin ?? $todos as $todo)
                    <tr >
                        <td>
                        <div class="flex items-center gap-3">
                            <div>
                                <div class="font-bold">{{ $todo->title }}</div>
                                <div class="text-sm opacity-75">{{ $todo->creation_date }}</div>
                            </div>
                        </div>
                        </td>
                        <td>
                        {{ \Illuminate\Support\Str::limit($todo->desc, 20) }}
                        </td>
                        @if (Auth::user()->role == 'admin')
                            <td>
                                <h1 class="font-semibold">
                                    {{ $todo->user->name ?? (App\Models\User::onlyTrashed()->find($todo->user_id)->name ?? 'Unknown') }}
                                </h1>
                            </td>
                        @endif


                        <td>
                            <div class=" badge badge-ghost dark:border-none
                            @if ($todo->priority == 'Low' )
                                        bg-info text-white font-medium
                                    @elseif ($todo->priority == 'Medium' )
                                        bg-warning text-white font-medium
                                    @elseif ($todo->priority == 'High' )
                                        bg-error text-white font-medium
                                    @endif">{{ $todo->priority }}</div>
                        </td>
                        <td>
                            <div class="badge badge-ghost dark:border-none
                            @if ($todo->stat == 'Not Done' )
                                        bg-error text-white font-medium
                                    @elseif ($todo->stat == 'To Do' )
                                        bg-warning text-white font-medium
                                    @elseif ($todo->stat == 'Done' )
                                        bg-success text-white font-medium
                                    @endif">{{ $todo->stat }}</div>
                        </td>
                        <td class="flex gap-1">
                            <!-- The button to open modal -->
                            <label for="my_modal_7" class="btn btn-success text-white btn-sm"><svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.90321 7.29677C1.90321 10.341 4.11041 12.4147 6.58893 12.8439C6.87255 12.893 7.06266 13.1627 7.01355 13.4464C6.96444 13.73 6.69471 13.9201 6.41109 13.871C3.49942 13.3668 0.86084 10.9127 0.86084 7.29677C0.860839 5.76009 1.55996 4.55245 2.37639 3.63377C2.96124 2.97568 3.63034 2.44135 4.16846 2.03202L2.53205 2.03202C2.25591 2.03202 2.03205 1.80816 2.03205 1.53202C2.03205 1.25588 2.25591 1.03202 2.53205 1.03202L5.53205 1.03202C5.80819 1.03202 6.03205 1.25588 6.03205 1.53202L6.03205 4.53202C6.03205 4.80816 5.80819 5.03202 5.53205 5.03202C5.25591 5.03202 5.03205 4.80816 5.03205 4.53202L5.03205 2.68645L5.03054 2.68759L5.03045 2.68766L5.03044 2.68767L5.03043 2.68767C4.45896 3.11868 3.76059 3.64538 3.15554 4.3262C2.44102 5.13021 1.90321 6.10154 1.90321 7.29677ZM13.0109 7.70321C13.0109 4.69115 10.8505 2.6296 8.40384 2.17029C8.12093 2.11718 7.93465 1.84479 7.98776 1.56188C8.04087 1.27898 8.31326 1.0927 8.59616 1.14581C11.4704 1.68541 14.0532 4.12605 14.0532 7.70321C14.0532 9.23988 13.3541 10.4475 12.5377 11.3662C11.9528 12.0243 11.2837 12.5586 10.7456 12.968L12.3821 12.968C12.6582 12.968 12.8821 13.1918 12.8821 13.468C12.8821 13.7441 12.6582 13.968 12.3821 13.968L9.38205 13.968C9.10591 13.968 8.88205 13.7441 8.88205 13.468L8.88205 10.468C8.88205 10.1918 9.10591 9.96796 9.38205 9.96796C9.65819 9.96796 9.88205 10.1918 9.88205 10.468L9.88205 12.3135L9.88362 12.3123C10.4551 11.8813 11.1535 11.3546 11.7585 10.6738C12.4731 9.86976 13.0109 8.89844 13.0109 7.70321Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg></label>

                            <!-- Put this part before </body> tag -->
                            <input type="checkbox" id="my_modal_7" class="modal-toggle" />
                            <div class="modal" role="dialog">
                            <div class="modal-box dark:bg-slate-700">
                                <h3 class="font-bold text-lg dark:text-slate-200">Restore Alert!</h3>
                                @if ($todo->user)
                                <p class="py-4">Are you sure you want to restore this todo?</p>
                                @else
                                <p class="py-4">If you want to restore this todo, you must restore the owner first on the trash user page. Or you can restore the owner to restore all the todos he has.</p>
                                @endif
                                <div class="modal-action flex gap-4">
                                    @if ($todo->user)
                                    <form action="/trash/{{ $todo->id }}/restore" method="POST">
                                        @csrf
                                        @method('PUT')
                                        @if ($todo->user->name)
                                        <button type="submit" class="btn btn-success text-white">Restore</button>
                                        @else
                                        <button type="submit" disabled class="btn btn-success text-white">Restore</button>
                                        @endif
                                    </form>
                                    @endif
                                    <label for="my_modal_7" class="btn">Close!</label>
                                </div>
                            </div>
                            </div>

                            <!-- The button to open modal -->
                            <label for="my_modal_6" class="btn btn-error text-white btn-sm"><svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 1C5.22386 1 5 1.22386 5 1.5C5 1.77614 5.22386 2 5.5 2H9.5C9.77614 2 10 1.77614 10 1.5C10 1.22386 9.77614 1 9.5 1H5.5ZM3 3.5C3 3.22386 3.22386 3 3.5 3H5H10H11.5C11.7761 3 12 3.22386 12 3.5C12 3.77614 11.7761 4 11.5 4H11V12C11 12.5523 10.5523 13 10 13H5C4.44772 13 4 12.5523 4 12V4L3.5 4C3.22386 4 3 3.77614 3 3.5ZM5 4H10V12H5V4Z" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"></path></svg></label>

                            <!-- Put this part before </body> tag -->
                            <input type="checkbox" id="my_modal_6" class="modal-toggle" />
                            <div class="modal" role="dialog">
                            <div class="modal-box dark:bg-slate-700">
                                <h3 class="font-bold text-lg dark:text-slate-200">Force Delete Alert!</h3>
                                <p class="py-4">Are you sure you want to delete this todo permanently? You can't restore it again!</p>
                                <div class="modal-action flex gap-4">
                                    <form action="/delete/{{ $todo->id }}/force" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-error text-white">Delete</button>
                                    </form>
                                    <label for="my_modal_6" class="btn">Close!</label>
                                </div>
                            </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
