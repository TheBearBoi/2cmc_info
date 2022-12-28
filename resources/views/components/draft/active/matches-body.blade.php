<div class="mx-auto text-center">
    <table class="mx-auto">
        {{ $matches }}
    </table>
    <livewire:next-round :label="'Begin Round '.($draft->phase-1)" :draft="$draft" />
</div>
