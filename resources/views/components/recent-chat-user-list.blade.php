<div class="pt-3">
    <div class="px-3">
        <h5 class="font-size-14 mb-3">Recent <a href="javascript:;" class="refreshRectChat float-end"><i
                    class="bx bx-refresh"></i></a></h5>

    </div>

    <ul class="list-unstyled chat-list recent-chat-list"></ul>
</div>

{{-- <ul class="list-unstyled chat-list">
    @foreach ($getRecentChats as $chat)
    @php
    if ($chat->participants['sender'] == auth()->user()->username) {
    $otherUserName = $chat->participants['receiver'];
    } else {
    $otherUserName = $chat->participants['sender'];
    }
    $otherUser = fetchUserByUsername($otherUserName);
    $unreadCount = $chat->unread_counts[auth()->user()->username];
    @endphp

    <li class="{{ $unreadCount > 0 ? 'unread' : '' }}">
        <a href="#">
            <div class="d-flex align-items-start">

                <div class="flex-shrink-0 user-img online align-self-center me-3">
                    <div class="avatar-sm align-self-center">
                        <span class="avatar-title rounded-circle bg-primary-subtle text-primary text-capitalize">
                            {{ $otherUser?->name[0] }}
                        </span>
                    </div>
                    <span class="user-status"></span>
                </div>

                <div class="flex-grow-1 overflow-hidden">
                    <h5 class="text-truncate font-size-13 mb-1">
                        {{ $otherUser?->name . '-' . $otherUserName }}
                    </h5>
                    <p class="text-truncate mb-0">{{ $chat->last_message }}</p>
                </div>
                <div class="flex-shrink-0">
                    <div class="font-size-11">{{ $chat->last_message_time }}</div>
                </div>
                @if ($unreadCount > 0)
                <div class="unread-message">
                    <span class="badge bg-danger rounded-pill">{{ $unreadCount }}</span>
                </div>
                @endif
            </div>
        </a>
    </li>

    @endforeach

</ul> --}}
@push('scripts')
    <script>
        window.getRecentChats = function () {
            var chatWindow = $('.recent-chat-list');
            fetch('{{ route('chat.recent-chat-list') }}')
                .then(response => response.json())
                .then(response => {
                    if (response.status === 'success') {
                        var html = '';
                        response.data.forEach(chat => {
                            var unreadClass = chat.unreadCount > 0 ? 'unread' : '';
                            var unreadBadge = chat.unreadCount > 0 ? `<div class="unread-message"><span class="badge bg-danger rounded-pill">${chat.unreadCount}</span></div>` : '';

                            html += `<li  class="${unreadClass}" data-otherusername="${chat.otherUser.username}" data-othername="${chat.otherUser.name}"> <a href="#"> <div class="d-flex align-items-start"> <div class="flex-shrink-0 user-img online align-self-center me-3"> <div class="avatar-sm align-self-center"> <span class="avatar-title rounded-circle bg-primary-subtle text-primary text-capitalize"> ${chat.otherUser.initial} </span> </div> <span class="user-status"></span> </div> <div class="flex-grow-1 overflow-hidden"> <h5 class="text-truncate font-size-13 mb-1"> ${chat.otherUser.name}-${chat.otherUser.username} </h5> <p class="text-truncate mb-0">${chat.last_message}</p> </div> <div class="flex-shrink-0"> <div class="font-size-11">${chat.last_message_time}</div> </div> ${unreadBadge} </div> </a> </li>`;
                        });
                        chatWindow.html(html);
                        if (window.applyChatSearch) window.applyChatSearch();
                    }
                });
        }
        async function getChat(userId, cursor = null) {
            try {
                let url = "{{ route('chat.get-chat-messages', ['userid' => ':userid']) }}";
                url = url.replace(':userid', userId);
                if (cursor) {
                    url += `?cursor=${cursor}`;
                }
                let response = await fetch(url);
                let data = await response.json();
                return data;
            } catch (error) {
                console.error("Fetch error:", error.message);
                throw error; // Propagate the error
            }
        }
        function setChatRead(userId) {
            let url = "{{ route('chat.set-chat-read', ['userid' => ':userid']) }}";
            fetch(url.replace(':userid', userId))
                .then(response => response.json())
                .then(response => {
                    if (response.status === 'success') {
                        console.log('response', response);
                    }
                });
        }
        $(document).ready(function () {

            getRecentChats();
            $('.refreshRectChat').click(function (e) {
                e.preventDefault();
                getRecentChats();
            });

        });
    </script>
@endpush