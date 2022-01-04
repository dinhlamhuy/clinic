@extends('website.ws_layout')
@section('ws_title')
<title>Chuyên khoa điều trị</title>
@endsection
@section('ws_css')
<style>
.radien {
    background-color: #e8e8e4;
    background-image: linear-gradient(180deg, #fcd5ce, #90e0ef);
}

.col1 {
    background-color: #f8edeb;
}

.chuyenkhoa {
    color: #9c6644;
    font-weight: bold;
}
</style>
@endsection
@section('ws_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 radien">
            <h2 style="padding-top:80px;padding-bottom:10px;padding-left:120px;font-weight:bold;color:#bb3e03;">CHUYÊN KHOA ĐIỀU TRỊ</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1 col1"></div>
        <div class="col-md-10">
            <div class="chkhoa mt-5">
                <h3  style="font-weight: bold;color:#2698d6;">Chuyên khoa khám bệnh</h3>
                <img src="{{asset('website/images/chuyenkhoakhambenh.jpg')}}" alt="" width="600px;">
                <p class="mt-2">
                    Khoa Khám bệnh có đầy đủ các khoa phòng như: khám Nội, Siêu âm, X-Quang, chụp CT, nội soi tiêu hóa …
                    đáp ứng được các nhu cầu khám chữa bệnh khác nhau của khách hàng.

                </p>

                <p style="font-weight:bold;">Dịch vụ</p>
                <p>
                    <span>+ Khoa Khám bệnh cung cấp các dịch vụ dành cho khách hàng đến khám, triểm tra sức khỏe , khám
                        nội đa khoa và chuyên khoa.</span><br>
                    <span>+ Phòng khám xây dựng các gói khám sức khỏe từ tổng quát đến chuyên sâu theo từng nhóm khách
                        hàng, đảm bảo tiết kiệm thời gian, chi phí.</span>
                </p>
            </div>
            <div class="chkhoa mt-5">
                <h3  style="font-weight: bold;color:#2698d6;">Chuyên khoa nội tổng hợp</h3>
                <img src="{{asset('website/images/chuyenkhoatieuhoa.jpg')}}" alt="" width="600px;">
                <p class="mt-2">
                    Phòng Khám Đa Khoa Phương Ngân có đầy đủ các chuyên khoa về hô hấp, tim mạch, nội tiết, tiêu hóa,
                    thần kinh… được trang bị hệ thống trang thiết bị y tế hiện đại với công nghệ hoàn toàn mới, phục vụ
                    chức năng như: xét nghiệm, nội soi, siêu âm… Đặc biệt, hệ thống máy xét nghiệm của Khoa Nội hiện nay
                    là một trong những máy móc hiện đại và đa chức năng cao cấp nhất, cùng lúc có thể xét nghiệm cho ra
                    hàng chục kết quả chỉ dựa trên một mẫu.

                </p>
                <p>
                    Với đội ngũ bác sĩ có chuyên môn cao cùng với sự đầu tư hệ thống máy móc phục vụ cho công việc khám
                    và chữa bệnh hiện đại, khoa Nội Phòng Khám Đa Khoa Phương Ngân không chỉ chữa trị các bệnh thường
                    gặp như tim mạch, cao huyết áp, đái tháo đường, viêm loét dạ dày, bệnh lý về khớp… mà còn có thể sớm
                    chẩn đoán và chữa trị, giảm bớt ảnh hưởng xấu tới bệnh nhân ở nhiều bệnh thể nặng như tai biến mạch
                    máu não, chẩn đoán ung thư sớm…
                </p>
                <p style="font-weight:bold;">Dịch vụ</p>
                <p>
                    <span>+ Điều trị các bệnh dạ dày, gan mật tụy, viêm gan virus và các bệnh rối loạn tiêu
                        hóa.</span><br>
                    <span>+ Khám và điều trị các bệnh như cao huyết áp, suy tim, rối loạn nhịp tim, bệnh mạch vành, xơ
                        vữa động mạch, tai biến mạch máu não.</span><br>
                    <span>+ Khám và điều trị các bệnh về đường hô hấp như bệnh hen, COPD, lao…</span><br>
                    <span>+ Khám và điều trị các bệnh bướu cổ, tiểu đường, suy giáp, cường giáp và các bệnh về nội tiết
                        khác.</span><br>
                    <span>+ Trị các bệnh lý về thận, viêm đường tiết niệu, sỏi thận, sỏi tiết niệu</span><br>
                    <span>+ Khám và điều trị các bệnh thần kinh như động kinh, trầm cảm, hội chứng parkinson, đau thần
                        kinh tọa, bệnh mất ngủ, bệnh sa sút trí tuệ</span><br>
                    <span>+ Khám và điều trị các bệnh về cơ xương khớp như thoái hóa cột sống, gai cột sống, loãng
                        xương, viêm khớp, vẹo cột sống…</span><br>
                    <span>+ Cung cấp dịch vụ điều trị và chăm sóc với chất lượng cao cho bệnh nhân trong nước và nước
                        ngoài.</span>
                </p>
            </div>
            <div class="chkhoa mt-5">
                <h3  style="font-weight: bold;color:#2698d6;">Chuyên khoa tai-mũi-họng</h3>
                <img src="{{asset('website/images/chuyenkhoataimuihong.jpg')}}" alt="" width="600px;">
                <p class="mt-2">
                    Khoa Tai Mũi Họng là chuyên khoa điều trị các bệnh lý liên quan đến tai, mũi và họng. Do các Bác sỹ
                    công tác tại khoa tai mũi họng có kinh nghiệm đảm trách, hầu như thực hiện điều trị tất cả các bệnh
                    lý về tai mũi họng tại phòng khám.

                </p>
                <p>
                    Khoa Tai Mũi Họng cung cấp dịch vụ đa dạng, từ khám bệnh đến thực hiện các loại phẫu thuật cho cả
                    trẻ em và người lớn.

                </p>
            </div>
            <div class="chkhoa mt-5">
                <h3  style="font-weight: bold;color:#2698d6;">Chuyên khoa da liễu</h3>
                <img src="{{asset('website/images/chuyenkhoadalieu.png')}}" alt="" width="600px;">
                <p class="mt-2">
                    Khoa Da liễu là khoa chuyên điều trị các bệnh về da và những phần phụ của da (tóc, móng, tuyến mồ
                    hôi…)

                </p>
                <p>
                    Khoa Da liễu cũng cung cấp nhiều dịch vụ xét nghiệm và điều trị các bệnh lây truyền qua đường tình
                    dục. Quy trình xét nghiệm và điều trị bệnh lây truyền qua đường tình dục được thực hiện đơn giản và
                    bảo mật. Khoa Da liễu cũng cung cấp dịch vụ tư vấn và hướng dẫn về sức khỏe tình dục trên mọi phương
                    diện.

                </p>
                <p>
                    Những căn bệnh thường gặp ở khoa da liễu như: nám da, tàn nhang, mụn/sẹo/rạn da, viêm da cơ địa,
                    viêm da tiếp xúc dị ứng/kích ứng, các bệnh về sắc tố da, lão hoá da, nấm, giang mai, sùi màu gà.
                </p>
            </div>
            <div class="chkhoa mt-5">
                <h3  style="font-weight: bold;color:#2698d6;">Chuyên khoa da liễu</h3>
                <img src="{{asset('website/images/chuyenkhoamat.jpg')}}" alt="" width="600px;">
                <p class="mt-2">
                    Bạn sẽ cảm thấy tin tưởng, an tâm và mong muốn được phục vụ bởi Bác sỹ của mình. <br>
                    Khám chuyên sâu và điều trị hiệu quả các bệnh lý của mắt. <br>
                    Khám phát hiện sớm và điều trị hiệu quả các trường hợp bệnh lý cườm nước - tăng nhãn áp và cườm khô
                    - đục thể thủy tinh. <br>
                    Phối hợp liên chuyên khoa mắt và nội tiết để điều trị hiệu quả bệnh lý võng mạc do tiểu đường. <br>
                    Đo khúc xạ - kính chính xác và tư vấn nhiều phương pháp điều trị chuyên sâu các bất thường khúc xạ
                    của mắt. <br>
                    Điều trị chảy nước mắt sống hiệu quả. <br>
                    Điều trị hiệu quả các bệnh lý bề mặt giác mạc: như bệnh lý khô mắt, viêm kết mạc cấp tính hoặc mãn
                    tính.
                </p>
            </div>
        </div>
        <div class="col-md-1 col1"></div>
    </div>
</div>
@endsection
@section('ws_js')
@endsection