<div>
    <form wire:submit.prevent="sendMessage">
        <div class="main-chat-footer">
            <input class="form-control" wire:model="body" placeholder="Type your message here..." type="text">
            <button type="submit" class="main-msg-send" href=""><i class="far fa-paper-plane"></i></button>
        </div>
    </form>
</div>
