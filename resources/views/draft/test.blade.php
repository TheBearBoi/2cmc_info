<a href="#" id="click">test</a>

<script>
    click.onclick = async function() {
        Echo.channel(`card_scanned`)
            .listen('OrderShipmentStatusUpdated', (e) => {
                console.log(e.order.name);
            });
    }


</script>
