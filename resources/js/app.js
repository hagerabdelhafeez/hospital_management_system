import './bootstrap';

import Alpine from 'alpinejs';

// Only initialize Alpine if it's not already loaded by Livewire
if (!window.Alpine) {
    window.Alpine = Alpine;
    Alpine.start();
}
