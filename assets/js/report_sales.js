function openPopup(obj){
    var data = $(obj).serialize();
    
    var url=BASE_URL+"/Report/sales_pdf?"+data;
    window.open(url, "Report", "width=700,height=500");
    
    return false;
}