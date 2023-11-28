const ctx = document.getElementById('chartone');
const labels = ['Monday  ', 'Tuesday ', 'Wednesday ', 'Thursday ', 'Friday ', 'Saturday ', 'Sunday '];
const data = [25, 34, 120, 44, 64, 88];

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: labels,
    datasets: [{
      label: 'Lợi Nhuận',
      data: data,
      borderWidth: 1,
      backgroundColor: 'rgba(255, 255, 255, 0.5)', // Màu trắng với độ trong suốt 0%
      borderColor: '#5856d6'
    }]
  },
  options: {
    plugins: {
      legend: {
        display: false
      }
    },
    maintainAspectRatio: false,
    scales: {
      x: {
        display: false,
      },
      y: {
        display: false,
        beginAtZero: true
      }
    }
  }
});
const data2 = [52, 22, 12, 23, 52, 5];

const ctx2 = document.getElementById('charttwo');
new Chart(ctx2, {
  type: 'line',
  data: {
    labels: labels,
    datasets: [{
      label: 'Quỹ Đóng Góp',
      data: data2,
      borderWidth: 1,
      backgroundColor: '#39f',
      borderColor: '#fff',
      tension: 0.5
      
    }]
  },
  options: {
    plugins: {
      legend: {
        display: false
      }
    },
    maintainAspectRatio: false,
    scales: {
      x: {
        display: false,
      },
      y: {
        display: false,
        beginAtZero: true,
      }
    }
  }
});
const data3 = [6, 23, 61, 21, 6, 43];

const ctx3 = document.getElementById('chartthree');
new Chart(ctx3, {
  type: 'line',
  data: {
    labels: labels,
    datasets: [{
      label: 'Donate',
      data: data3,
      borderWidth: 1,
      backgroundColor: '#2eb85c',
      borderColor: '#fff',
      tension: 0.5

    }]
  },
  options: {
    plugins: {
      legend: {
        display: false
      }
    },
    maintainAspectRatio: false,
    scales: {
      x: {
        display: false,
      },
      y: {
        display: false,
        beginAtZero: true,
      }
    }
  }
});
const data4 = [25, 66, 12, 6, 35, 67];

const ctx4 = document.getElementById('chartfour');
new Chart(ctx4, {
  type: 'line',
  data: {
    labels: labels,
    datasets: [{
      label: 'Quỹ Đóng Góp',
      data: data,
      borderWidth: 1,
      backgroundColor: '#e55353',
      borderColor: '#fff',
      tension: 0.5
    }]
  },
  options: {
    plugins: {
      legend: {
        display: false
      }
    },
    maintainAspectRatio: false,
    scales: {
      x: {
        display: false,
      },
      y: {
        display: false,
        beginAtZero: true,
      }
    }
  }
});
// big chart


const bigdata = [25, 34, 120, 44, 64, 88, 2, 5, 78];
const bigdata2 = [23, 5, 6, 4, 73, 23, 26, 55, 57];

const ctx5 = document.getElementById('chartbig');
new Chart(ctx5, {
  type: 'line',
  data: {
    labels: labels,
    datasets: [{
      label: 'Sustaining Profit',
      data: bigdata,
      borderWidth: 1,
      tension: 0.4
    },
    {
      label: 'Sustaining Profit 2',
      data: bigdata2,
      borderWidth: 1,
      tension: 0.4
    }]
  },
  options: {
    
    bezierCurve: false,
    beginAtZero: true,
    responsive: true,
    maintainAspectRatio: false, // Thiết lập giữ tỷ lệ khung nhìn
  }
});
