<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Marvel HTML Bootstrap 4 Template</title>

     {{-- font awsom --}}
     <link rel="stylesheet" href="{{  asset('css/all.min.css') }}">
     {{-- my css file --}}
     <link rel="stylesheet" href=" {{ asset('css/main_one.css') }}">
     {{-- google fonts --}}
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

     {{-- arabic font --}}
     <link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=harmattan" />
      {{-- jquery --}}




   {{-- my css file --}}


    <link rel="stylesheet" href="2115_marvel/css/bootstrap.min.css">
    <link rel="stylesheet" href="2115_marvel/css/unicons.css">
    <link rel="stylesheet" href="2115_marvel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="2115_marvel/css/owl.theme.default.min.css">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="2115_marvel/css/tooplate-style.css">
    <link rel="stylesheet" href="{{  asset('css/all.min.css') }}">



<!--

Tooplate 2115 Marvel

https://www.tooplate.com/view/2115-marvel

-->
  </head>
  <body style="background-color: #011631 !important;">

    <!-- MENU -->
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="40" height="40" x="0" y="0" viewBox="0 0 58 58" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g xmlns="http://www.w3.org/2000/svg" id="020---Astronaut-Fishing" fill="none"><path id="Shape" d="m43 42.62c-.3379353.0011786-.6536053-.1683999-.839193-.450816s-.215984-.6394602-.080807-.949184l5.92-13.43v-11.91c0-.5522847.4477153-1 1-1s1 .4477153 1 1c0 13.18 0 12.24-.08 12.52l-6 13.6c-.1534036.3734255-.5162981.6179849-.92.62z" fill="#9fc9d3" data-original="#9fc9d3"></path><path id="Shape" d="m55 42.62c-.3988865.001389-.7604469-.2344113-.92-.6l-6-13.62c-.12-.27-.08.77-.08-12.52 0-.5522847.4477153-1 1-1s1 .4477153 1 1v11.91l5.92 13.43c.135177.3097238.1047807.6667679-.080807.949184s-.5012577.4519946-.839193.450816z" fill="#9fc9d3" data-original="#9fc9d3"></path><path id="Shape" d="m4.6 33.64c-.99211719-.393589-1.70040588-1.2846619-1.86-2.34l-2.35-15.69c-.22405658-1.48989.69168272-2.9148488 2.14-3.33l7-2.28-.53 25.11c-1.52510285-.2937126-3.00461862-.7880054-4.4-1.47z" fill="#2c3e50" data-original="#2c3e50" class=""></path><circle id="Oval" cx="15.5" cy="44.5" fill="#95a5a5" r="13.5" data-original="#95a5a5"></circle><path id="Shape" d="m28 39.4c0 2.49.12 3.23-.35 4.17-.3957394.8372354-1.1097181 1.4815531-1.9830457 1.7895654-.8733277.3080124-1.8335418.2541626-2.6669543-.1495654-1.2141187-.5812238-1.9904613-1.8039635-2-3.15v1.94c.0229769 1.6799759-1.1317218 3.1473186-2.77 3.52-1.0400276.2257642-2.1262318-.0353567-2.9500022-.7091736-.8237703-.6738169-1.2950714-1.6866837-1.2799978-2.7508264v-6.49c.0137136-.4706972-.3028167-.8871845-.76-1-5.13-1.27-4.64-1.14-4.85-1.22-.64951859-.220843-1.21981361-.6276999-1.64-1.17 3.3043595-2.8001762 7.7509445-3.8462782 11.9571527-2.8130355 4.2062083 1.0332426 7.6620005 4.0205404 9.2928473 8.0330355z" fill="#7f8c8d" data-original="#7f8c8d"></path><circle id="Oval" cx="13" cy="51" fill="#7f8c8d" r="3" data-original="#7f8c8d"></circle><path id="Shape" d="m28 30.5c0 10.63.13 10.5-.35 11.5-.3939152.8390032-1.107118 1.485542-1.9806298 1.7954978-.8735119.3099558-1.8347224.2575637-2.6693702-.1454978-1.2141187-.5812238-1.9904613-1.8039635-2-3.15v1.9c.0229769 1.6799759-1.1317218 3.1473186-2.77 3.52-1.0331243.2241586-2.1121714-.032052-2.9342528-.6967136-.8220815-.6646616-1.2985817-1.6661275-1.2957472-2.7232864v-6.5c.0137136-.4706972-.3028167-.8871845-.76-1-5.07-1.22-4.64-1.1-4.85-1.18-1.42173936-.4915087-2.37933801-1.8257361-2.39-3.33v-10.93l15.78-1.12 5.33 9.73c.5743638.6400232.891411 1.4700456.89 2.33z" fill="#35495e" data-original="#35495e" class=""></path><path id="Shape" d="m23 31v12.65c-1.2208078-.5736582-2.0001538-1.8011281-2-3.15 0-10.53.13-10-.37-10.81-.2554087-.3042648-.3064977-.7308589-.130159-1.0868298.1763387-.355971.5466622-.5738083.9434698-.5549823.3968075.0188261.744844.2707453.8866892.6418121.4297194.6945333.661403 1.4933229.67 2.31z" fill="#2c3e50" data-original="#2c3e50" class=""></path><path id="Shape" d="m20 21.25c2.38 5.25.28 6 1.24 8.07 1.25 2.74 7.52 3 5.73-6.2-.33-1.72-.93-4.19-2.32-5.38z" fill="#3f5c6c" data-original="#3f5c6c" class=""></path><path id="Shape" d="m21 36c1.93-2.17 4.73-5.23 6.66-7 5.25-4.86 14.16-11.68 24.77-14 1.0216142-.2862559 1.641929-1.3204371 1.4134623-2.3565071-.2284668-1.03607-1.2262027-1.7134502-2.2734623-1.5434929-9.17 2-20 7.74-30.17 18.49-.1414094.1285478-.2749825.2654602-.4.41z" fill="#a56a43" data-original="#a56a43"></path><circle id="Oval" cx="49" cy="47" fill="#95a5a5" r="9" data-original="#95a5a5"></circle><circle id="Oval" cx="45.5" cy="47.38" fill="#7f8c8d" r="2.5" data-original="#7f8c8d"></circle><g fill="#f0c419"><path id="Shape" d="m35 12c-.5522847 0-1-.4477153-1-1v-4c0-.55228475.4477153-1 1-1s1 .44771525 1 1v4c0 .5522847-.4477153 1-1 1z" fill="#f0c419" data-original="#f0c419" class=""></path><path id="Shape" d="m37 10h-4c-.5522847 0-1-.44771525-1-1s.4477153-1 1-1h4c.5522847 0 1 .44771525 1 1s-.4477153 1-1 1z" fill="#f0c419" data-original="#f0c419" class=""></path><path id="Shape" d="m41 33c-.5522847 0-1-.4477153-1-1v-4c0-.5522847.4477153-1 1-1s1 .4477153 1 1v4c0 .5522847-.4477153 1-1 1z" fill="#f0c419" data-original="#f0c419" class=""></path><path id="Shape" d="m43 31h-4c-.5522847 0-1-.4477153-1-1s.4477153-1 1-1h4c.5522847 0 1 .4477153 1 1s-.4477153 1-1 1z" fill="#f0c419" data-original="#f0c419" class=""></path><path id="Shape" d="m53 6c-.5522847 0-1-.44771525-1-1v-4c0-.55228475.4477153-1 1-1s1 .44771525 1 1v4c0 .55228475-.4477153 1-1 1z" fill="#f0c419" data-original="#f0c419" class=""></path><path id="Shape" d="m55 4h-4c-.5522847 0-1-.44771525-1-1s.4477153-1 1-1h4c.5522847 0 1 .44771525 1 1s-.4477153 1-1 1z" fill="#f0c419" data-original="#f0c419" class=""></path></g><path id="Shape" d="m27.08 51.45c-1.416961 2.3384766-3.5087159 4.193166-6 5.32-1.4690774-1.6568542-1.3168542-4.1909226.34-5.66s4.1909226-1.3168542 5.66.34z" fill="#7f8c8d" data-original="#7f8c8d"></path><path id="Shape" d="m9 42.5c-.00192966 1.6317484-.8870337 3.1345994-2.31314562 3.9275758-1.42611193.7929764-3.16975063.7518135-4.55685438-.1075758-.39697391-2.8320991.12529462-5.7168441 1.49-8.23 1.3211629-.2634476 2.69086264.0788743 3.73274031.9329041 1.04187766.8540298 1.64632667 2.1299229 1.64725969 3.4770959z" fill="#7f8c8d" data-original="#7f8c8d"></path><path id="Shape" d="m6.44 16.43c-.39.65-.38.94-.67 2.71-.65025595 3.8968475 1.3168738 7.762156 4.85 9.53 6.5 3.24 6.45 3.33 7.38 3.33 1.0838202-.0009025 2.0828854-.5863207 2.6134532-1.5313947.5305679-.945074.5101339-2.1028425-.0534532-3.0286053-.6-1-1.35-1.18-3.83-2.43l-3.42-1.71c-.8568552-.426616-1.4586988-1.2365044-1.62-2.18z" fill="#3f5c6c" data-original="#3f5c6c" class=""></path><path id="Shape" d="m5 11c0 6.0751322 4.92486775 11 11 11 6.0751322 0 11-4.9248678 11-11 0-6.07513225-4.9248678-11-11-11-6.07513225 0-11 4.92486775-11 11z" fill="#547580" data-original="#547580" class=""></path><path id="Shape" d="m25.61 16.35c-4.12 2.58-10.33 2.07-13.61-1.05-4.84-4.57-.42-11.3 7.5-11.3 2.1507016-.03067647 4.2671057.54085657 6.11 1.65 1.8515714 3.3263641 1.8515714 7.3736359 0 10.7z" fill="#f0c419" data-original="#f0c419" class=""></path><path id="Shape" d="m24 12c-.5522847 0-1-.4477153-1-1 0-3-3.84-3-4-3-.5522847 0-1-.44771525-1-1s.4477153-1 1-1c2.08 0 6 1.05 6 5 0 .5522847-.4477153 1-1 1z" fill="#f9eab0" data-original="#f9eab0"></path><path id="Shape" d="m26.59 14c-.2373639.8271452-.5730957 1.6228296-1 2.37-2.9419533 1.7117525-6.4638161 2.1211872-9.72 1.13-5.09-1.54-7.26-5.9-5-9.42 3.18 3.71 8.28 7.23 15.72 5.92z" fill="#f29c1f" data-original="#f29c1f" class=""></path><path id="Shape" d="m57.92 48.15c-.3488774 2.6941832-1.896059 5.0866184-4.21 6.51-1.5821234-.5326587-2.667076-1.991857-2.7215676-3.6603504-.0544917-1.6684935.932938-3.1953741 2.4769346-3.8301294 1.5439966-.6347552 3.3198355-.2438871 4.454633.9804798z" fill="#7f8c8d" data-original="#7f8c8d"></path><path id="Shape" d="m53 39.38c-.1478202 1.5136451-1.4845126 2.6275555-3 2.5-2.28 0-3.74-2-2.61-3.74 1.8880289-.3426117 3.8361405-.0728193 5.56.77.0290014.1551079.0457199.3122622.05.47z" fill="#7f8c8d" data-original="#7f8c8d"></path></g></g></svg>    Medium</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="#about" class="nav-link"><span data-hover="About" style="color: white;">About</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#project" class="nav-link"><span data-hover="Discover" style="color: white;">Discover</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link"><span data-hover="Login" style="color: white;">Login</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link"><span data-hover="Register" style="color: white;">Register</span></a>
                    </li>
                </ul>


            </div>
        </div>
    </nav>

    <!-- ABOUT -->
    <section class="about full-screen d-lg-flex justify-content-center align-items-center" id="about">
        <div class="container">
            <div class="row">

                <div class="col-lg-7 col-md-12 col-12 d-flex align-items-center" style="  padding: 0px !important;">
                    <div class="about-text">
                        <small class="small-text">Welcome in <span class="mobile-block">Blog</span></small>
                        <h1 class="animated animated-text">
                            <span class="mr-2">Discover</span>
                                <div class="animated-info">
                                    <span class="animated-item">stories</span>
                                    <span class="animated-item">thinking</span>
                                    <span class="animated-item">expertise</span>
                                </div>
                        </h1>

                        <p>Building a successful product is a challenge. I am highly energetic in user experience design, interfaces and web development.</p>

                        <div class="custom-btn-group mt-4">
                          <a href="#" class="btn mr-lg-2 custom-btn"><i class='uil uil-file-alt'></i> Download Resume</a>
                          <a href="#contact" class="btn custom-btn custom-btn-bg custom-btn-link">Get a free quote</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 col-12">
                    <div class="about-image svg">
                        <img src="https://i.pinimg.com/564x/50/1b/bc/501bbc83fda795e76f7d7fb05285468b.jpg" class="img-fluid" alt="svg image">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="line" style="width: 100%;height: 2px;background: #ffc200;"></div>
<div class="tred-container" style="background: white;padding-top: 30px;width: 100%;padding-bottom: 30px;">
    <div class="title-famous" style="width: 80%;margin-left: auto;margin-right: auto;">
        <div class="title-famous-title" style="font-size: 20px;font-weight: 400;width: fit-content;border-bottom: 2px solid #00000012;padding-bottom: 5px;">Trending on Medium</div>
        <div class="box-trend" style="margin-top: 20px;display: flex;flex-wrap: wrap;justify-content: space-around;
        ">
          @for ($i = 0; $i < 6  ; $i++)
          <div class="trend-item" style="display: flex;width: 280px;margin-top: 20px;">
            <div class="number" style="font-size: 25px;font-weight: 500;color: #c4c4ae;margin-right: 10px;">0{{ $i+1}}</div>
            <div class="trend-info" style="display: flex;flex-direction: column;">
                <div class="image-box-name" style="display: flex;">
                    <div class="box-image" style="width: 30px;height: 30px;border-radius: 15px;overflow: hidden;">
                        <img src="{{$trend[$i]->user->image->path  ?? asset('image/me.jpg')}}" alt="">
                    </div>
                    <div class="name-box" style="margin-left: 10px;">
                        {{$trend[$i]->user->name}}
                    </div>
                </div>

                <div class="trend-info-title" style="margin-top: 5px;margin-bottom: 5px;width: 200px;text-align: left;font-weight: bold;-webkit-box-orient: vertical;display: -webkit-box;text-overflow: ellipsis;overflow: hidden;-webkit-line-clamp: 1;">
                    {{$trend[$i]->title}}
                </div>
                <div class="trend-info-data" style="font-size: 15px;">
                    {{$trend[$i]->created_at->diffForHumans()}}
                </div>
            </div>
          </div>
          @endfor

        </div>
    </div>
</div>

   <div class="home-container" style="width: 100%;background: white;border-top: 2px solid #00000029;">
       <div class="home-container-limit" style="width: 80%;margin-left: auto;margin-right: auto;display: flex;justify-content: space-between;">

            <div class="posts-box" style="margin-top: 30px;width: 60%;">
                @foreach ($posts as $post)
                <div class="box-post">
                    <div class="box-title">
                        <div class="box-image">
                            <img src="{{ $post->user->image->path ?? '/image/me.jpg' }}" alt="">
                        </div>
                        <span><a href="{{route('profile' , ['username' => $post->user->name])}}" style="text-decoration: none;color: rgba(32, 32, 32, 0.795)">{{ $post->user->name}}</a></span>
                        <span>{{$post->time_ago}}</span>
                    </div>
                    <div class="box-body">
                        <a href="{{route('posts.show' , ['post' => $post->id])}}">
                            <div class="box-body-lef">
                                <div class="title">{{$post->title}}</div>
                                <div class="body">{{ $post->body}}</div>
                            </div>
                            <div class="box-body-right">
                                @if (!empty($post->image->path))
                                <img src="{{ $post->image->path }}" alt="">
                                @else
                                <img src="{{ asset('image/me.jpg') }}" alt="">
                                @endif

                            </div>
                        </a>

                    </div>
                    <div class="box-footer">
                        <div class="box-footer-left">
                            <span>Algorithms</span>
                            <span>2 min read</span>
                            <span>Based on your reading history</span>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>

            <div class="discover-tags" style="width: 30%;margin-top: 40px;">
                <div class="search_input" style="margin-top: 5px;padding-bottom: 15px;border-bottom: 1px solid #adadad69;margin-bottom: 10px;">
                    <form action="{{route('home')}}" >
                        <input type="text" name="search" id="" required='required' placeholder="{{ __('messages.search')}}" style="width: 100%;">
                        <button type="submit" style="left: -2px ;">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="35" height="35" x="0" y="0" viewBox="0 0 96 96" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g transform="matrix(0.7,0,0,0.7000000000000001,14.100000000000009,14.099999999999994)">
                                    <path xmlns="http://www.w3.org/2000/svg" id="Search" d="m49.557 18.444c.781.781.781 2.047 0 2.828-.391.391-.902.586-1.414.586s-1.023-.195-1.414-.586c-7.02-7.019-18.438-7.019-25.457 0-.781.781-2.047.781-2.828 0s-.781-2.047 0-2.828c8.577-8.578 22.535-8.578 31.113 0zm40.443 63.556c0 2.137-.832 4.146-2.344 5.656-1.51 1.512-3.519 2.344-5.656 2.344s-4.146-.832-5.656-2.344l-21-21c-.781-.781-.781-2.047 0-2.828l2.828-2.828-4.435-4.435c-5.28 4.623-12.184 7.435-19.737 7.435-16.542 0-30-13.458-30-30s13.458-30 30-30 30 13.458 30 30c0 7.553-2.812 14.457-7.435 19.737l4.435 4.435 2.828-2.828c.781-.781 2.047-.781 2.828 0l21 21c1.512 1.51 2.344 3.519 2.344 5.656zm-30-48c0-14.336-11.663-26-26-26s-26 11.664-26 26 11.663 26 26 26 26-11.664 26-26zm26 48c0-1.068-.416-2.072-1.172-2.828l-19.586-19.586-5.656 5.656 19.586 19.586c1.512 1.512 4.145 1.512 5.656 0 .756-.756 1.172-1.76 1.172-2.828z" fill="#000000" data-original="#000000" class=""></path>
                                </g>
                            </svg>
                        </button>
                    </form>
                </div>
                <h4 style="font-size: 20px;color: #212529ab;">Discover more of what matters to you</h4>
                <div class="tages-box" style="width: 100%;margin-top: 20px;display: flex;flex-wrap: wrap;">
                    @foreach ($tags_all as $tag)
                    <div class="tage-element" style="padding: 2px 20px;border: 1px solid #00000052;color: #2125299c;font-size: 15px;margin: 5px 5px;">{{ $tag->name}}</div>
                    @endforeach
                </div>
            </div>
       </div>
   </div>


    <script src="2115_marvel/js/jquery-3.3.1.min.js"></script>
    <script src="2115_marvel/js/popper.min.js"></script>
    <script src="2115_marvel/js/bootstrap.min.js"></script>
    <script src="2115_marvel/js/Headroom.js"></script>
    <script src="2115_marvel/js/jQuery.headroom.js"></script>
    <script src="2115_marvel/js/owl.carousel.min.js"></script>
    <script src="2115_marvel/js/smoothscroll.js"></script>
    <script src="2115_marvel/js/custom.js"></script>
    <script src="{{asset('js/home_out.js')}}"></script>
  </body>
</html>
