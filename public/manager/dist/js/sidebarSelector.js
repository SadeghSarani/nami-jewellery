$(document).ready(function () {
    $('#sending-order').click(function () {
        $.ajax({
            url : "{{route('getAllOrder')}}",
            method : "POST",
            data : {
                status : 'sending'
            },
        })
    })

    $('#posted-order').click(function () {
        $.ajax({
            url : "{{route('getAllOrder')}}",
            method : "POST",
            data : {
                status : 'posted'
            },
        })
    })

    $('#new-order').click(function () {
        $.ajax({
            url : "{{route('getAllOrder')}}",
            method : "POST",
            data : {
                status : 'new'
            },
        })
    })
})
