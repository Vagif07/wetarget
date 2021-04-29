$("form").on('submit', function () {
    collect_user_input();
});


function collect_user_input() {
    let queries = []
    const inputs = document.getElementsByTagName('input')
    for (let index = 0; index < inputs.length; index++) {
        let value = inputs[index].value
        if (
            inputs[index].type === 'text' &&
            value.length > 0
        ) {
            let date = Math.floor(Date.now() / 1000)
            let input_object = {}
            input_object[date] = value
            queries.push(input_object)
        }
    }

    return save_data(queries)
}


function save_data(queries) {
    $.ajax({
        type: "POST",
        url: "http://localhost:8888/save-user-tags",
        data: {
            "queries" : queries,
            "referrer": window.location.href
        },
    })
}
