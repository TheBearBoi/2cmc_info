<button wire:click="next_round">
    {{ $label }}
</button>
<script>
    window.addEventListener('contentChanged', (t) => {
        alert('Please submit all ' + t + ' before moving to the next round!');
    });
</script>
