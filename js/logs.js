const DB = [
    {
        "id": 101,
        "name": "TV",
        "action": "Turn on",
        "date": 124518
    },
    {
        "id": 101,
        "name": "Washer",
        "action": "Sleep",
        "date": 124518
    },
    {
        "id": 101,
        "name": "Selling Fan",
        "action": "Turn off",
        "date": 124518
    },
    {
        "id": 101,
        "name": "TV",
        "action": "Turn on",
        "date": 124518
    },
    {
        "id": 101,
        "name": "Washer",
        "action": "Sleep",
        "date": 124518
    },
    {
        "id": 101,
        "name": "Selling Fan 2",
        "action": "Turn off",
        "date": 124518
    },
    {
        "id": 101,
        "name": "TV 2",
        "action": "Turn on",
        "date": 124518
    },
    {
        "id": 101,
        "name": "Washer 2",
        "action": "Sleep",
        "date": 124518
    },
    {
        "id": 101,
        "name": "Selling Fan 2",
        "action": "Turn off",
        "date": 124518
    },
    {
        "id": 101,
        "name": "TV 2",
        "action": "Turn on",
        "date": 124518
    },
    {
        "id": 101,
        "name": "Washer 3",
        "action": "Sleep",
        "date": 124518
    },
    {
        "id": 101,
        "name": "Selling Fan 3",
        "action": "Turn off",
        "date": 124518
    }
]
const limit = 5;
const table = document.querySelector('#table');
const sum = document.querySelector('#count');
const paginate = document.querySelector('#pages');
const keyword = document.querySelector('#keyword');
const search = document.querySelector('#search');

function countPage(data) {

}

function render(data) {
    let count = 0;
    table.innerHTML = '';
    data.forEach((item) => {
        table.innerHTML += `
        <tr class="logs-table_grid table-hover">
            <td class="text-start table-line-over">${item.id}</td>
            <td class="text-end table-line-over">${item.name}</td>
            <td class="text-end table-line-over">${item.action}</td>
            <td class="text-end table-line-over">${item.date}</td>
        </tr>
        `
    })

    for (let i = 0; i <= DB.length; i++) {
        count++;
    }
    sum.innerHTML = count - 1;

}



window.onload = () => {
    paginates(DB);
}
function paginates(data) {
    const page = [];
    paginate.innerHTML = '';
    for (let i = 0; i < data.length; i++) {
        if (i % limit == 0) {
            pages = i / limit + 1;
            page.push(pages);
        }
    }
    page.forEach((item) => {
        paginate.innerHTML += `
            <input type="submit" class="paginate-item" value="${item}">
        `
    })
    const show = data.filter((item, index) => {
        if (index < limit && item !== undefined) {
            return item
        }
    }
    )
    render(show);
    clickPage = document.querySelectorAll('.paginate-item');
    for (let i = 0; i < clickPage.length; i++) {
        clickPage[0].classList.add('active');
        clickPage[i].addEventListener('click',() => {
            for (let j = 0; j < clickPage.length; j++) {
                clickPage[j].classList.remove('active');
            }
            clickPage[i].classList.add('active');
        })
    }
    for (let i = 0; i < clickPage.length; i++) {
        clickPage[i].addEventListener('click', () => {
            if (clickPage[i].value > 0) {
                const newDB = data.map((item, index) => {
                    if (clickPage[i].value * limit > index && index + 1 > (clickPage[i].value - 1) * limit) {
                        return item;
                    }
                })
                const show = newDB.filter((item) => {
                    if (item !== undefined) {
                        return item;
                    }
                })
                render(show);
            }
        })
    }
}
search.addEventListener('click', (e) => {
    e.preventDefault();
    const newsDB = DB.filter((item) => {
        if (item.name.toLowerCase().indexOf(keyword.value.toLowerCase()) >= 0) {
            return item;
        }
    })
    paginates(newsDB);
})


