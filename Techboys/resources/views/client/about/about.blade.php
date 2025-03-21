@extends('client.layouts.master')

@section('main')
<div id="content" class="site-content">
    <div class="col-full">
        <div class="row">
            <nav class="woocommerce-breadcrumb">
                <a href="{{ route('home') }}">Trang chủ</a>
                <span class="delimiter">
                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                </span>
                Về chúng tôi
            </nav>
            <!-- .woocommerce-breadcrumb -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="type-page hentry">
                        <header class="entry-header">
                            <!-- .page-featured-image -->
                            <div class="page-header-caption">
                                <h1 class="entry-title">Về chúng tôi</h1>
                                <p class="entry-subtitle">Đam mê công nghệ, kết nối tương lai,
                                    <br> TechBoys – Nơi hội tụ đam mê công nghệ! Chúng tôi là một doanh nghiệp chuyên cung cấp các sản phẩm điện thoại và đồ điện tử chất lượng cao, cam kết mang đến trải nghiệm tốt nhất cho khách hàng. Với sứ mệnh "Kết nối công nghệ – Nâng tầm cuộc sống", TechBoy không ngừng cập nhật những sản phẩm mới nhất, từ smartphone cao cấp đến các thiết bị điện tử thông minh. Tại TechBoys, chúng tôi luôn đặt uy tín – chất lượng – dịch vụ lên hàng đầu, đảm bảo khách hàng nhận được sản phẩm chính hãng với giá cả hợp lý. Hãy đồng hành cùng chúng tôi để khám phá thế giới công nghệ đỉnh cao!</p>
                            </div>
                            <!-- .page-header-caption -->
                        </header>
                        <!-- .entry-header -->
                        <div class="entry-content">
                            <div class="about-features row">
                                <div class="col-md-4">
                                    <div class="single-image">
                                        <img alt="" class="" src="{{ asset('home/assets/images/about/about1.avif') }}">
                                    </div>
                                    <!-- .single_image -->
                                    <div class="text-block">
                                        <h2 class="align-top">Chúng tôi làm gì</h2>
                                        <p>Chúng tôi chuyên cung cấp điện thoại và thiết bị điện tử chất lượng cao, cam kết mang đến sản phẩm chính hãng với giá cả cạnh tranh. Bên cạnh đó, TechBoys luôn cập nhật xu hướng công nghệ mới nhất để đáp ứng nhu cầu đa dạng của khách hàng.</p>
                                    </div>
                                    <!-- .text_block -->
                                </div>
                                <!-- .col -->
                                <div class="col-md-4">
                                    <div class="single-image">
                                        <img alt="" class="" src="{{ asset('home/assets/images/about/about2.avif') }}">
                                    </div>
                                    <!-- .single_image -->
                                    <div class="text-block">
                                        <h2 class="align-top">Tầm nhìn của chúng tôi</h2>
                                        <p>TechBoys hướng tới trở thành một trong những hệ thống bán lẻ điện thoại và thiết bị điện tử hàng đầu, nơi khách hàng có thể tìm thấy những sản phẩm công nghệ tiên tiến nhất với dịch vụ tốt nhất. Chúng tôi không ngừng đổi mới, nâng cao trải nghiệm mua sắm và xây dựng một cộng đồng yêu công nghệ vững mạnh.</p>
                                    </div>
                                    <!-- .text_block -->
                                </div>
                                <!-- .col -->
                                <div class="col-md-4">
                                    <div class="single-image">
                                        <img alt="" class="" style="width: 442px" src="{{ asset('home/assets/images/about/about3.avif') }}">
                                    </div>
                                    <!-- .single_image -->
                                    <div class="text-block">
                                        <h2 class="align-top">Đội ngũ nhân viên</h2>
                                        <p>Tại TechBoys, chúng tôi tự hào có một đội ngũ nhân viên trẻ trung, nhiệt huyết và giàu kinh nghiệm trong lĩnh vực công nghệ. Mỗi thành viên đều được đào tạo bài bản, luôn sẵn sàng tư vấn, hỗ trợ khách hàng với thái độ tận tâm và chuyên nghiệp. Chúng tôi tin rằng, với tinh thần làm việc trách nhiệm và sáng tạo, TechBoy sẽ mang đến cho khách hàng những trải nghiệm mua sắm tốt nhất.</p>
                                    </div>
                                    <!-- .text_block -->
                                </div>
                                <!-- .col -->
                            </div>
                            <!-- .about-features -->
                            <div class="row accordion-block">
                                <div class="text-boxes col-sm-7">
                                    <div class="row first-row">
                                        <div class="col-sm-6">
                                            <div class="text-block">
                                                <h3 class="highlight">Chúng tôi làm gì?</h3>
                                                <p>Chúng tôi chuyên cung cấp điện thoại và thiết bị điện tử chất lượng cao, cam kết mang đến sản phẩm chính hãng với giá cả cạnh tranh. Bên cạnh đó, TechBoys luôn cập nhật xu hướng công nghệ mới nhất để đáp ứng nhu cầu đa dạng của khách hàng.</p>
                                            </div>
                                            <!-- .text-block -->
                                        </div>
                                        <!-- .col -->
                                        <div class="col-sm-6">
                                            <div class="text-block">
                                                <h3 class="highlight">Tầm nhìn của chúng tôi</h3>
                                                <p>TechBoys hướng tới trở thành một trong những hệ thống bán lẻ điện thoại và thiết bị điện tử hàng đầu, nơi khách hàng có thể tìm thấy những sản phẩm công nghệ tiên tiến nhất với dịch vụ tốt nhất. Chúng tôi không ngừng đổi mới, nâng cao trải nghiệm mua sắm và xây dựng một cộng đồng yêu công nghệ vững mạnh.</p>
                                            </div>
                                            <!-- .text-block -->
                                        </div>
                                        <!-- .col -->
                                    </div>
                                    <!-- .row -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="text-block">
                                                <h3 class="highlight">Đội ngũ nhân viên</h3>
                                                <p>Tại TechBoys, chúng tôi tự hào có một đội ngũ nhân viên trẻ trung, nhiệt huyết và giàu kinh nghiệm trong lĩnh vực công nghệ. Mỗi thành viên đều được đào tạo bài bản, luôn sẵn sàng tư vấn, hỗ trợ khách hàng với thái độ tận tâm và chuyên nghiệp. Chúng tôi tin rằng, với tinh thần làm việc trách nhiệm và sáng tạo, TechBoy sẽ mang đến cho khách hàng những trải nghiệm mua sắm tốt nhất.</p>
                                            </div>
                                            <!-- .text-block -->
                                        </div>
                                        <!-- .col -->
                                        <div class="col-sm-6">
                                            <div class="text-block">
                                                <h3 class="highlight">Chất lượng sản phẩm</h3>
                                                <p>TechBoy cam kết cung cấp các sản phẩm chính hãng 100%, đảm bảo chất lượng cao và nguồn gốc rõ ràng. Chúng tôi luôn chọn lọc kỹ lưỡng từ những thương hiệu uy tín, mang đến cho khách hàng những thiết bị công nghệ hiện đại, bền bỉ và đáng tin cậy. Mỗi sản phẩm tại TechBoy đều được kiểm tra cẩn thận trước khi đến tay khách hàng, đi kèm với chế độ bảo hành minh bạch và dịch vụ hậu mãi tận tâm.</p>
                                            </div>
                                            <!-- .text-block -->
                                        </div>
                                        <!-- .col -->
                                    </div>
                                    <!-- .row -->
                                </div>
                                <!-- .text-boxes -->
                                <div class="about-accordion col-sm-5">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <h3 class="about-accordion-title">Chúng tôi có thể giúp gì bạn?</h3>
                                            <div id="accordion" role="tablist" aria-multiselectable="true">
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingOne">
                                                        <h5 class="mb-0">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                <i class="fa-icon"></i>
                                                                Hỗ trợ 24/7
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <!-- .card-header -->
                                                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="card-block">
                                                            TechBoys luôn sẵn sàng hỗ trợ khách hàng mọi lúc, mọi nơi với dịch vụ chăm sóc khách hàng 24/7. Dù bạn cần tư vấn sản phẩm, giải đáp thắc mắc hay hỗ trợ kỹ thuật, đội ngũ chuyên viên của chúng tôi sẽ luôn lắng nghe và phản hồi nhanh chóng. Sự hài lòng của khách hàng là ưu tiên hàng đầu của TechBoys!
                                                        </div>
                                                    </div>
                                                    <!-- .collapse -->
                                                </div>
                                                <!-- .card -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingTwo">
                                                        <h5 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                                <i class="fa-icon"></i>
                                                                Best Quality
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <!-- .card-header -->
                                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                        <div class="card-block">
                                                            TechBoys cam kết mang đến sản phẩm chính hãng, dịch vụ uy tín và trải nghiệm mua sắm tốt nhất. Chúng tôi luôn chọn lọc những thiết bị công nghệ hiện đại từ các thương hiệu hàng đầu, đảm bảo chất lượng vượt trội. Mỗi sản phẩm đều được kiểm định nghiêm ngặt, đi kèm chế độ bảo hành rõ ràng, giúp khách hàng yên tâm tuyệt đối khi sử dụng.
                                                        </div>
                                                    </div>
                                                    <!-- .collapse -->
                                                </div>
                                                <!-- .card -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingThree">
                                                        <h5 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                                <i class="fa-icon"></i>
                                                                Giao hàng nhanh
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <!-- .card-header -->
                                                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                                        <div class="card-block">
                                                            TechBoys cam kết giao hàng nhanh chóng, an toàn và đúng hẹn trên toàn quốc. Chúng tôi hợp tác với các đơn vị vận chuyển uy tín để đảm bảo sản phẩm đến tay khách hàng trong thời gian ngắn nhất. Dù bạn ở đâu, TechBoy luôn sẵn sàng mang công nghệ đến tận cửa nhà bạn! 
                                                        </div>
                                                    </div>
                                                    <!-- .collapse -->
                                                </div>
                                                <!-- .card -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingFour">
                                                        <h5 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                                <i class="fa-icon"></i>
                                                                Chăm sóc khách hàng
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <!-- .card-header -->
                                                    <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                                                        <div class="card-block">
                                                            TechBoys luôn đặt khách hàng lên hàng đầu với dịch vụ chăm sóc tận tâm, chuyên nghiệp. Đội ngũ hỗ trợ của chúng tôi luôn sẵn sàng lắng nghe, giải đáp thắc mắc và xử lý mọi vấn đề một cách nhanh chóng. Dù bạn cần tư vấn sản phẩm, hỗ trợ kỹ thuật hay bảo hành, TechBoy cam kết mang đến trải nghiệm phục vụ tốt nhất!
                                                        </div>
                                                    </div>
                                                    <!-- .collapse -->
                                                </div>
                                                <!-- .card -->
                                                <div class="card">
                                                    <div class="card-header" role="tab" id="headingFive">
                                                        <h5 class="mb-0">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                                                <i class="fa-icon"></i>
                                                                Rất nhiều khách hàng hài lòng
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <!-- .card-header -->
                                                    <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive">
                                                        <div class="card-block">
                                                            TechBoys tự hào khi nhận được sự tin tưởng và yêu thích từ hàng nghìn khách hàng. Với sản phẩm chất lượng, dịch vụ tận tâm và chính sách ưu đãi hấp dẫn, chúng tôi đã và đang mang đến trải nghiệm mua sắm tuyệt vời. Sự hài lòng của khách hàng chính là động lực để TechBoy không ngừng phát triển và hoàn thiện mỗi ngày!
                                                        </div>
                                                    </div>
                                                    <!-- .collapse -->
                                                </div>
                                                <!-- .card -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .entry-content -->
                    </div>
                    <!-- .hentry -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>
@endsection