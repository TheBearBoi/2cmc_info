<a href="#" id="click">test</a>

<script>
    click.onclick = async function() {

        const [nfc_reader] = await navigator.hid.requestDevice({ filters: [] })

        await nfc_reader.open();

        await nfc_reader.addEventListener("inputreport", (event) => {
            const { data, device, reportId } = event;
            console.log(`User pressed button ${data.getUint32()}.`);
        });
    }


</script>
