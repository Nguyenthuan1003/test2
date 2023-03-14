const sum = document.querySelector('#sum');
const nameDevice = document.querySelector('#name');
const ip = document.querySelector('#ip');
const mac = document.querySelector('#mac');
const date = document.querySelector('#date');
const power = document.querySelector('#power');
const nameError = document.querySelector('#name-error');
const ipError = document.querySelector('#ip-error');
const macError = document.querySelector('#mac-error');
const dateError = document.querySelector('#date-error');
const powerError = document.querySelector('#power-error');
const save = document.querySelector('#save');
const table = document.querySelector('#dashboard-table');
let nameDv = document.querySelectorAll('.chart-name');
let powerDv = document.querySelectorAll('.chart-power');
let nameDB = [];
let value = [];
for (let i = 0; i < nameDv.length; i++) {
  nameDB.push(nameDv[i].textContent);
}
for (let i = 0; i < powerDv.length; i++) {
  value.push(powerDv[i].textContent);
}


let temp = 0;
const day = new Date();

//   for (let i = 0; i < 16; i++) {
//     const randomColor = Math.floor(Math.random() * 16777216).toString(16);
//     const color = `#${randomColor}`;
//     barColors.push(color);
//   }
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

const data = {
  labels: nameDB,
  datasets: [{
    label: nameDB,
    data: value,
    hoverOffset: 4,
    backgroundColor: barColors,
  }]
};

const options = {
  title: {
    display: true,
    text: "Power Consummption"
  },
  responsive: true,
  maintainAspectRatio: true,
  legend: {
    position: 'top',
    labels: {
      font: {
        size: 5,
        family: 'vazir'
      }
    }
  }
}
const config = {
  type: 'doughnut',
  data: data,
  options: options
};

let myChart = new Chart(
  document.querySelector('#myChart'),
  config
)

function destroyChart() {
  myChart.destroy();
}

function render() {
  temp = 0;
  sum.innerHTML = temp;
  destroyChart();
  const data = {
    labels: nameDB,
    datasets: [{
      label: nameDB,
      data: value,
      hoverOffset: 4,
      backgroundColor: barColors,
    }]
  };
  const options = {
    title: {
      display: true,
      text: "Power Consummption"
    },
    responsive: true,
    maintainAspectRatio: true,
    legend: {
      position: 'top',
      labels: {
        font: {
          size: 5,
          family: 'vazir'
        }
      }
    }
  }
  const config = {
    type: 'doughnut',
    data: data,
    options: options
  };

  myChart = new Chart(
    document.querySelector('#myChart'),
    config
  )
  let checkUrl = window.location.href.search('edit');
  console.log(checkUrl);
  if(checkUrl > 0){
    document.querySelector('#save').style.display = 'none';
    document.querySelector('#update').style.display = 'block';
  }
  const btnUpdate = document.querySelector('#update-btn');
  btnUpdate.addEventListener('click', () => {
    document.querySelector('#update').style.display = 'none';
    document.querySelector('#save').style.display = 'block';
  })
  // const edits = document.querySelectorAll('.edit')
  // edits.forEach((item) => {
  //   item.addEventListener('click', (e) => {
  //     e.preventDefault();
  //     const update = document.querySelector('#update');
      // document.querySelector('#save').style.display = 'none';
      // update.style.display = 'block';
      // const id = index;
      // const newItem = dt.filter((item, index) => {
      //   if (id == index) {
      //     return item;
      //   }
      // })
      // if (newItem) {
      //   nameDevice.value = newItem[0].device;
      //   ip.value = newItem[0].iP;
      //   mac.value = newItem[0].mac;
      //   date.value = newItem[0].create_at;
      //   power.value = newItem[0].power;
      //   update.addEventListener('click', (e) => {
      //     e.preventDefault();
      //     let err = false;
      //     nameError.innerHTML = '';
      //     ipError.innerHTML = '';
      //     dateError.innerHTML = '';
      //     macError.innerHTML = '';
      //     powerError.innerHTML = '';
      //     if (nameDevice.value.trim() == '') {
      //       nameError.innerHTML = 'Vui long nhap ten thiet bi';
      //       err = true;
      //     }
      //     if (ip.value.trim() == '') {
      //       ipError.innerHTML = 'Vui long nhap dia chi IP';
      //       err = true;
      //     }
      //     if (mac.value.trim() == '') {
      //       macError.innerHTML = 'Vui long nhap dia chi Mac';
      //       err = true;
      //     }
      //     if (date.value.trim() == '') {
      //       dateError.innerHTML = 'Vui long nhap thoi gian';
      //       err = true;
      //     }
      //     if (power.value.trim() == '') {
      //       powerError.innerHTML = 'Vui long nhap muc tieu thu dien nang';
      //       err = true;
      //     }
      //     if (!nameDevice.value.match(/^[A-Z][A-Za-z0-9\s]+$/g) && nameDevice.value.trim() != '') {
      //       nameError.innerHTML = 'Ten thiet bi phai lon hon 2 ky tu va bat dau bang chu in hoa ';
      //       err = true;
      //     }
      //     if (!ip.value.match(/^((25[0-5]|2[0-4]\d|1\d{2}|[1-9]?\d)(\.|$)){4}\b/) && ip.value.trim() != '') {
      //       ipError.innerHTML = 'Dia chi IP khong dung dinh dang';
      //       err = true;
      //     }
      //     for (let i = 0; i < dt.length; i++) {
      //       if (i !== id) {
      //         console.log(nameDevice.value.trim());
      //         if (dt[i].device.includes(nameDevice.value.trim())) {
      //           nameError.innerHTML = 'Ten thiet bi da ton tai';
      //           err = true;
      //         }
      //         if (dt[i].iP.includes(ip.value.trim())) {
      //           ipError.innerHTML = 'Dia chi IP da ton tai';
      //           err = true;
      //         }
      //       }
      //     }
      //     if (err == false) {
      //       const device = {
      //         "device": nameDevice.value.trim(),
      //         "mac": mac.value.trim(),
      //         "iP": ip.value.trim(),
      //         "create_at": date.value.trim(),
      //         "power": Number(power.value.trim())
      //       }
      //       const newDB = dt.map((item, index) => {
      //         if (index == id) {
      //           return device
      //         } else {
      //           return item
      //         }
      //       })
      //       console.log(newDB);
      //       render(newDB);
      //       document.querySelector('#save').style.display = 'block';
      //       update.style.display = 'none';
      //       nameDevice.value = '';
      //       ip.value = '';
      //       mac.value = '';
      //       date.value = '';
      //       power.value = '';
      //     }
      //   })
      // }

  //   })
  // })
  // deletes.forEach((item, index) => {
  //   item.addEventListener('click', (e) => {
  //     e.preventDefault();
  //     const id = index
  //     const newDB = dt.filter((item, index) => {
  //       if (index !== id) {
  //         return item;
  //       }
  //     })
  //     render(newDB);
  //   })
  // })
  // save.addEventListener('click', (e) => {
  // e.preventDefault();
  // let err = false;
  // nameError.innerHTML = '';
  // ipError.innerHTML = '';
  // dateError.innerHTML = '';
  // macError.innerHTML = '';
  // powerError.innerHTML = '';
  // if (nameDevice.value.trim() == '') {
  //   nameError.innerHTML = 'Vui long nhap ten thiet bi';
  //   err = true;
  // }
  // if (ip.value.trim() == '') {
  //   ipError.innerHTML = 'Vui long nhap dia chi IP';
  //   err = true;
  // }
  // if (mac.value.trim() == '') {
  //   macError.innerHTML = 'Vui long nhap dia chi Mac';
  //   err = true;
  // }
  // if (date.value.trim() == '') {
  //   dateError.innerHTML = 'Vui long nhap thoi gian';
  //   err = true;
  // }
  // if (power.value.trim() == '') {
  //   powerError.innerHTML = 'Vui long nhap muc tieu thu dien nang';
  //   err = true;
  // }
  // if (!nameDevice.value.match(/^[A-Z][A-Za-z0-9\s]+$/g) && nameDevice.value.trim() != '') {
  //   nameError.innerHTML = 'Ten thiet bi phai lon hon 2 ky tu va bat dau bang chu in hoa ';
  //   err = true;
  // }
  // if (!ip.value.match(/^((25[0-5]|2[0-4]\d|1\d{2}|[1-9]?\d)(\.|$)){4}\b/) && ip.value.trim() != '') {
  //   ipError.innerHTML = 'Dia chi IP khong dung dinh dang';
  //   err = true;
  // }
  // for (let i = 0; i < data.length; i++) {
  //   if (dt[i].device == nameDevice.value.trim()) {
  //     nameError.innerHTML = 'Ten thiet bi da ton tai';
  //     err = true;
  //   }
  //   if (dt[i].iP == ip.value.trim()) {
  //     ipError.innerHTML = 'Dia chi IP da ton tai';
  //     err = true;
  //     break;
  //   }

  // }
  // if (err == false) {
  //   const device = {
  //     "device": nameDevice.value.trim(),
  //     "mac": mac.value.trim(),
  //     "iP": ip.value.trim(),
  //     "create_at": date.value.trim(),
  //     "power": Number(power.value.trim())
  //   }
  //   dt.push(device);
  //   render(dt);
  }
//   )})
// }
window.onload = () => {
  render();
}
