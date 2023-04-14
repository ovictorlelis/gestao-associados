<div>
    <h1>Login</h1>

    {{ $user }}
    <form wire:submit.prevent="test">
        <input class="border" id="user" name="user" type="text" wire:model="user">
        <input type="submit" value="Enviar">
        @error('user')
            {{ $message }}
        @enderror
    </form>
</div>
