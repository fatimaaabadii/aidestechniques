const region = document.getElementById('region');


region.addEventListener('change', function(e){
    console.log(e.target.value);


    document.getElementById('delegations').innerHTML = '<option value="0">Select Delegation</option>';
    if(e.target.value != 0)
    {
        $.ajax({
            url: '/getregions/ajax',
            type: 'GET',
            data: {
                region_id: e.target.value
            },
            dataType: 'json',
            success: function(data){

                const delegations = document.getElementById('delegations');

                data.delegations.forEach(element => {

                    delegations.innerHTML += `
                    <option value="${element.id}">
                        ${element.label}
                    </option>`;
                });


                delegations.disabled = false;
            }
        });
    }
    // /getregions/ajax

})
