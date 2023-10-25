
$(document).ready(function(){
  
  day365();
  var chart = new Morris.Line({
    // ID of the element in which to draw the chart.
    element: 'chart',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    // data: [
    //   { date: '2008', num_order: 20, revenue: 100, quantity: 20 },
    //   { date: '2009', num_order: 10, revenue: 50, quantity: 10 },
    //   { date: '2010', num_order: 5, revenue: 25, quantity: 5  },
    //   { date: '2011', num_order: 5, revenue: 25, quantity: 5  },
    //   { date: '2012', num_order: 20, revenue: 100, quantity: 20  }
    // ],
    // The name of the data record attribute that contains x-values.
    xkey: 'date',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['num_order', 'revenue', 'quantity'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Số lượng đơn hàng', 'Doanh thu', 'Số lượng']
  });

  $("#btn-filterDay").click(function(){
    var from_date = $("#filter-from-date").val();
    var to_date = $("#filter-to-date").val();
    $.ajax({
      url:"./admin/statistical",
      method:"POST",
      dataType:"JSON",
      // cache: false,
      data: {from_date:from_date, to_date:to_date},
      success:function(data)
      {
        chart.setData(data);//đổ dữ liệu vào biểu đồ
        // $('#text-date').text(text);
      }
    });
  });

  $("#select-statis").change(function(){
    var time = $(this).val();
    if (time == '7days') {
      var text = "7 ngày qua";
    }
    else if (time == '30days') {
      var text = "30 ngày qua";
    }
    else if (time == '90days') {
      var text = "90 ngày qua";
    }
    else if (time == '365days') {
      var text = "365 ngày qua";
    }

    $('#text-date').text(text);

    $.ajax({
      url:"./admin/statistical",
      method:"POST",
      dataType:"JSON",
      cache: false,
      data: {time:time},
      success:function(data)
      {
        chart.setData(data);
      }
    });

  });

  function day365(){
    var text = "365 ngày qua";
    $('#text-date').text(text); //mặc định dữ liệu thống kê theo 365 ngay
    $.ajax({
      url:"./admin/statistical",
      method:"POST",
      dataType:"JSON",
      cache: false,
      success:function(data)
      {
        chart.setData(data);
      }
    });
  }
})

