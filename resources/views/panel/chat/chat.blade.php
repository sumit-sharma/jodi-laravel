@extends('layouts.home')

@section('main-content')
    <style>
        .ctext-wrap-content .time {
            opacity: 1 !important;
        }
    </style>
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Chat</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Chat</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="d-lg-flex">
            <div class="chat-leftsidebar card">
                <div class="p-3 px-4 border-bottom">
                    <div class="d-flex align-items-start ">
                        {{-- <div class="flex-shrink-0 me-3 align-self-center">
                            <img src="assets/images/users/avatar-1.jpg" class="avatar-sm rounded-circle" alt="">
                        </div> --}}

                        <div class="flex-grow-1">
                            <h5 class="font-size-16 mb-1"><a href="#"
                                    class="text-dark">{{ auth()->user()->name . ' - ' . auth()->user()->username }} <i
                                        class="mdi mdi-circle text-success align-middle font-size-10 ms-1"></i></a></h5>
                            <p class="text-muted mb-0">Available</p>
                        </div>

                        <div class="flex-shrink-0">
                            {{-- <div class="dropdown chat-noti-dropdown">
                                <button class="btn dropdown-toggle p-0" type="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                </button>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="p-3">
                    <div class="search-box position-relative">
                        <input type="search" id="chat-search" class="form-control rounded border" placeholder="Search...">
                        <i class="bx bx-search search-icon"></i>
                    </div>
                </div>

                <div class="chat-leftsidebar-nav">
                    <ul class="nav nav-pills nav-justified bg-light p-1">
                        <li class="nav-item">
                            <a href="#chat" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                <i class="bx bx-chat font-size-20 d-sm-none"></i>
                                <span class="d-none d-sm-block">Chat</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#contacts" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="bx bx-book-content font-size-20 d-sm-none"></i>
                                <span class="d-none d-sm-block">Contacts</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="chat">
                            <div class="chat-message-list" data-simplebar style="max-height: 500px;">
                                {{-- @dump($getRecentChats) --}}
                                @include('components.recent-chat-user-list')
                            </div>
                        </div>


                        <div class="tab-pane" id="contacts">
                            <div class="chat-message-list" data-simplebar style="max-height: 500px;">
                                <div class="pt-3">
                                    <div class="px-3">
                                        <h5 class="font-size-14 mb-3">Contacts</h5>
                                    </div>
                                    @foreach ($employees as $key => $item)
                                        <div>
                                            <div class="mt-4">
                                                <div class="px-3 contact-list">{{ $key }}</div>
                                                <ul class="list-unstyled chat-list">
                                                    @foreach ($item as $subItem)
                                                        {{-- <li>
                                                            <a href="#">
                                                                <h5 class="font-size-13 mb-0">{{ $subItem->name }}</h5>
                                                            </a>
                                                        </li> --}}
                                                        <li data-otherusername="{{ $subItem->username }}"
                                                            data-othername="{{ $subItem->name }}">
                                                            <a href="#">
                                                                <div class="d-flex align-items-start">

                                                                    <div
                                                                        class="flex-shrink-0 user-img online align-self-center me-3">
                                                                        <div class="avatar-sm align-self-center">
                                                                            <span
                                                                                class="avatar-title rounded-circle bg-primary-subtle text-primary text-capitalize">
                                                                                {{ $subItem->name[0] }}
                                                                            </span>
                                                                        </div>
                                                                        <span class="user-status"></span>
                                                                    </div>

                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <h5 class="text-truncate font-size-13 mb-1">
                                                                            {{ $subItem->name . '-' . $subItem->username }}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>


                                        </div>

                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end chat-leftsidebar -->

            <div class="w-100 user-chat mt-4 mt-sm-0 ms-lg-1">
                <div id="dv_cht" class="card vh-100 d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <h3 class="mb-0">Select a user on left side to start messaging...</h3>
                    </div>
                </div>
                <div class="card chat-on d-none">
                    <div class="p-3 px-lg-4 border-bottom">
                        <div class="row">
                            <div class="col-xl-4 col-7">
                                <div class="d-flex align-items-center">
                                    {{-- <div class="flex-shrink-0 avatar-sm me-3 d-sm-block d-none">
                                        <img src="assets/images/users/avatar-2.jpg" alt=""
                                            class="img-fluid d-block rounded-circle">
                                    </div> --}}
                                    <div class="flex-grow-1">
                                        <h5 class="font-size-14 mb-1 text-truncate"><a href="#" id="chat-profile-name"
                                                class="text-dark text-uppercase"></a></h5>
                                        <p class="text-muted text-truncate mb-0">Online</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-5">
                                <ul class="list-inline user-chat-nav text-end mb-0">
                                    <li class="list-inline-item">
                                        <div class="dropdown">
                                            <button class="btn nav-btn dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-search"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-2">
                                                <form class="px-2">
                                                    <div>
                                                        <input type="text" class="form-control border bg-light-subtle"
                                                            placeholder="Search...">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="chat-conversation p-3" data-simplebar style="max-height: 550px;">
                        <ul class="list-unstyled mb-0 chat-messages">

                        </ul>
                    </div>

                    <div class="p-3 border-top">
                        <div class="row">
                            <div class="col">
                                <div class="position-relative">
                                    <input type="text" class="form-control border bg-light-subtle"
                                        placeholder="Enter Message...">
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light"><span
                                        class="d-none d-sm-inline-block me-2">Send</span> <i
                                        class="mdi mdi-send float-end"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end user chat -->
        </div>
        <!-- End d-lg-flex  -->

        <!-- container-fluid -->
    </div>
@endsection


@section('footer-script')
    <script src="https://unpkg.com/infinite-scroll@5/dist/infinite-scroll.pkgd.min.js"></script>

    <script>
        $(document).ready(function () {
            let currentOtherUserId = null;
            let nextCursor = null;
            let isLoading = false;
            let lastMessageDate = null;
            let firstMessageDate = null;
            const currentUserId = "{{ auth()->user()->username }}";
            const chatContainer = $('.chat-conversation');
            const messageList = $('.chat-messages');
            let echoChannel = null;

            // Access existing SimpleBar instance
            const simpleBarInstance = SimpleBar.instances.get(chatContainer[0]);
            const scrollElement = simpleBarInstance.getScrollElement();

            $(document).on('click', '.chat-list li a', function (e) {
                e.preventDefault();
                console.log('time', dayjs().format('hh:mm:ss A'));
                let listItem = $(this).closest('li');
                let otherUserName = listItem.data('otherusername');
                let otherName = listItem.data('othername');

                if (currentOtherUserId === otherUserName) return;

                currentOtherUserId = otherUserName;
                nextCursor = null;
                lastMessageDate = null;
                firstMessageDate = null;
                $('#chat-profile-name').text(`${otherName}-${otherUserName}`);
                messageList.empty();
                loadMessages(false);
                subscribeToChat(otherUserName);
                $('.chat-on').removeClass('d-none');
                $('#dv_cht').addClass('d-none');
            });

            function subscribeToChat(otherUserId) {
                if (echoChannel) {
                    console.log('Leaving channel:', echoChannel);
                    window.Echo.leave(echoChannel);
                }
                // Generate conversation_id consistently (same as backend)
                let sender = parseInt(currentUserId);
                let receiver = parseInt(otherUserId);
                let conversationId = sender < receiver ? `${sender}_${receiver}` : `${receiver}_${sender}`;
                echoChannel = `chat.${conversationId}`;
                console.log('Subscribing to echoChannel channel:', echoChannel);

                window.ACTIVE_CHAT_ID = conversationId;


                // window.Echo.channel(echoChannel)
                //     .listen('.message.sent', (e) => {
                //         console.log('Real-time message received:', e.message);

                //         // Append to message list if it's the current conversation
                //         if (e.message.conversation_id === conversationId) {
                //             if (e.message.sender != currentUserId) {
                //                 appendReceivedMessage(e.message);
                //             }
                //         }

                //         // Always refresh recent chats
                //         if (window.getRecentChats) {
                //             window.getRecentChats();
                //         }
                //     });
            }

            function appendReceivedMessage(msg) {
                let msgDate = dayjs(msg.createdAt).format('YYYY-MM-DD');
                let displayDate = formatDateLabel(msg.createdAt);
                let html = '';

                if (msgDate !== lastMessageDate) {
                    html += `<li class="chat-day-title"><span class="title">${displayDate}</span></li>`;
                    lastMessageDate = msgDate;
                }

                let time = dayjs(msg.createdAt).format('hh:mm A');
                html += `<li> <div class="conversation-list"> <div class="d-flex"> <div class="flex-grow-1"> <div class="ctext-wrap"> <div class="ctext-wrap-content"> <div class="conversation-name"> <span class="time">${time}</span> </div> <p class="mb-0">${msg.message}</p> </div> </div> </div> </div> </div> </li>`;

                messageList.append(html);
                scrollToBottom();
            }

            async function loadMessages(isPrepend = false) {
                if (isLoading || !currentOtherUserId) return;
                if (isPrepend && !nextCursor) return;

                isLoading = true;
                try {
                    let response = await getChat(currentOtherUserId, nextCursor);
                    if (response.status === 'success') {
                        let messages = response.data.data;
                        nextCursor = response.data.next_cursor;

                        renderMessages(messages, isPrepend);

                        if (!isPrepend) {
                            setTimeout(scrollToBottom, 100);
                        }
                    }
                } catch (error) {
                    console.error("Error loading messages:", error);
                } finally {
                    isLoading = false;
                }
            }

            function renderMessages(messages, isPrepend) {
                console.log('renderMessages', messages);
                let html = '';
                let batch = [...messages].reverse(); // Oldest first in this batch (ASC)

                batch.forEach((msg, index) => {
                    let msgDate = dayjs(msg.createdAt).format('YYYY-MM-DD');
                    let displayDate = formatDateLabel(msg.createdAt);

                    // For Appending (Newer messages)
                    if (!isPrepend) {
                        if (msgDate !== lastMessageDate) {
                            html += `<li class="chat-day-title"><span class="title">${displayDate}</span></li>`;
                            lastMessageDate = msgDate;
                        }
                    }

                    let isRight = msg.sender == currentUserId ? 'right' : '';
                    let time = dayjs(msg.createdAt).format('hh:mm A');

                    html += ` <li class="${isRight}"> <div class="conversation-list"> <div class="d-flex"> <div class="flex-grow-1"> <div class="ctext-wrap"> <div class="ctext-wrap-content"> <div class="conversation-name"> <span class="time">${time}</span> </div> <p class="mb-0">${msg.message}</p> </div> </div> </div> </div> </div> </li>`;
                });

                if (isPrepend) {
                    // When prepending, we need to handle the date headers differently
                    // To keep it simple but functional, we'll just prepend the batch
                    // A more advanced version would merge date headers
                    let previousHeight = scrollElement.scrollHeight;
                    messageList.prepend(html);
                    setTimeout(() => {
                        let newHeight = scrollElement.scrollHeight;
                        scrollElement.scrollTop = newHeight - previousHeight;
                    }, 0);
                } else {
                    messageList.append(html);
                }
            }

            function formatDateLabel(date) {
                const d = dayjs(date);
                if (d.isSame(dayjs(), 'day')) return 'Today';
                if (d.isSame(dayjs().subtract(1, 'day'), 'day')) return 'Yesterday';
                return d.format('DD MMM, YYYY');
            }

            function scrollToBottom() {
                scrollElement.scrollTop = scrollElement.scrollHeight;
            }

            // Infinite Scroll (Load older messages on scroll top)
            scrollElement.addEventListener('scroll', function (e) {
                if (e.target.scrollTop === 0 && nextCursor && !isLoading) {
                    loadMessages(true);
                }
            });

            // Demo send functionality
            $('.chat-send').click(function () {
                let messageInput = $('input[placeholder="Enter Message..."]');
                let message = messageInput.val();
                if (message && currentOtherUserId) {
                    let time = dayjs().format('hh:mm A');
                    let html = ` <li class="right"> <div class="conversation-list"> <div class="d-flex"> <div class="flex-grow-1"> <div class="ctext-wrap"> <div class="ctext-wrap-content"> <div class="conversation-name"><span class="time">${time}</span></div> <p class="mb-0">${message}</p> </div> </div> </div> </div> </div> </li>`;
                    messageList.append(html);
                    scrollToBottom();
                    messageInput.val('');
                    $.ajax({
                        url: "{{ route('chat.send-message') }}",
                        type: 'POST',
                        data: {
                            receiver: currentOtherUserId,
                            message: message,
                        },
                        success: function (response) {
                            console.log(response);
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                }
            });

            // Allow enter to send
            $('input[placeholder="Enter Message..."]').on('keypress', function (e) {
                if (e.which == 13) {
                    $('.chat-send').click();
                }
            });

            // Search functionality for both Chat and Contacts
            window.applyChatSearch = function () {
                let term = $('#chat-search').val().trim().toLowerCase();

                if (term === '') {
                    $('.chat-list li').show();
                    $('.contact-list').each(function () {
                        $(this).closest('.mt-4').show();
                        $('.contact-list').show();

                    });
                    return;
                }

                // Hide/Show list items in all .chat-list
                $('.chat-list li').each(function () {
                    let name = $(this).data('othername') ? $(this).data('othername').toString().toLowerCase() : '';
                    let username = $(this).data('otherusername') ? $(this).data('otherusername').toString().toLowerCase() : '';

                    if (name.includes(term) || username.includes(term)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                $('.contact-list').hide();



                // // Handle letter headers in the Contacts tab
                // $('.contact-list').each(function () {
                //     let parentGroup = $(this).closest('.mt-4');
                //     let visibleItems = parentGroup.find('ul.chat-list li:visible').length;

                //     if (visibleItems > 0) {
                //         parentGroup.show();
                //     } else {
                //         parentGroup.hide();
                //     }
                // });
            }

            $('#chat-search').on('input', applyChatSearch);

            // Re-apply search when switching tabs
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
                applyChatSearch();
            });
        });
    </script>
@endsection