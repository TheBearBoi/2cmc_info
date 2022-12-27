<button wire:click="next_round">
    {{ $label }}
</button>
<script>
    window.addEventListener('MissingData', (e) => {
        alert('Please submit all ' + e.detail.type + ' before moving to the next round!');
    });
</script>
