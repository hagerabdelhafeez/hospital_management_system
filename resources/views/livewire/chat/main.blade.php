 <div class="row row-sm main-content-app mb-4">
        <div class="col-xl-4 col-lg-5">
            <div class="card">
                <div class="main-content-left main-content-left-chat">
                    <nav class="nav main-nav-line main-nav-line-chat">
                        <a class="nav-link active" data-toggle="tab" href="">المحادثات الاخيرة</a>
                    </nav>
                    @livewire('chat.chatlist')
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <a class="main-header-arrow" href="" id="ChatBodyHide"><i class="icon ion-md-arrow-back"></i></a>
                @livewire('chat.chatbox')
                @livewire('chat.send-message')
            </div>
        </div>
    </div>
