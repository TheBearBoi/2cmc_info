<button wire:click="next_round" class="p-2 mt-4 border-black bg-slate-500 rounded-lg mx-auto">
    {{ $label }}
</button>
<script>
    window.addEventListener('MissingData', (e) => {
        alert('Please submit all ' + e.detail.type + ' before moving to the next round!');
    });
</script>
