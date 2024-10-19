@extends('dashboard.app')

@section('style')
    <style>
        a {
            text-decoration: none;
            color: inherit;
        }
        a:hover {
            text-decoration: none;
            color: #ffc107;
        }
        a:visited {
            text-decoration: none;
            color: inherit;
        }
    </style>

@endsection

@section('content')
    <div class="content-container">
    <div class="col-12 d-flex justify-content-center">
        <h1>Ask Sphere Dashboard</h1>
    </div>

    <div class="col-12 mt-4 topCategories">
        <div class="card">
            <div class="card-body">
                <h3>Top Categories</h3>
                <div class="row mt-3">
                    @foreach ($topCategories as $category)
                        <div class="col-lg-3 col-md-4 col-xs-6 mt-2">
                            <a class="card-link showCategory" href="#" data-category-id="{{ $category['id'] }}">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class>{{$category['name']}}</h5>
                                    <span class="badge badge-warning">{{$category['questions_count']}} questions</span>
                                    <span class="badge badge-dark">{{$category['tags_count']}} tags</span>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-body">
                <h3>Newest Questions</h3>
                <div class="row mt-3">
                    @foreach ($newestQuestions as $question)
                        <div class="col-12 mt-2">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mt-2">{{$question['user_name']}}</h6>
                                </div>
                                <div class="card-body">
                                    <span class="badge badge-light">{{$question['category_name']}} likes</span>
                                    <br><p>{{$question['content']}}</p>
                                    <span class="badge badge-warning">{{$question['likes_count']}} likes</span>
                                    <span class="badge badge-dark">{{$question['answers_count']}} answers</span>
                                    <span class="badge badge-light">{{$question['views']}} views</span>
                                    <br>
                                    @foreach ($question['tags'] as $tag)
                                        <span class="badge badge-secondary">{{$tag['tag_name']}} likes</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-body">
                <h3>Best Answers</h3>
                <div class="row mt-3">
                    @foreach ($bestAnswers as $answer)
                        <div class="col-12 mt-2">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="mt-2">{{$answer['questioner_name']}}</h6>
                                </div>
                                <div class="card-body">
                                    <span class="badge badge-light">{{$answer['category_name']}} likes</span>
                                    <br><p>{{$answer['question_content']}}</p>
                                    <span class="badge badge-warning">{{$answer['question_views']}} views</span>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="mt-2">{{$answer['user_name']}}</h6>
                                                    <p>{{$answer['content']}}</p>
                                                    <span class="badge badge-dark">{{$answer['likes_count']}} likes</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection

@section('script')
    @section('script')
        <script>
            $(document).ready(function() {
                $('.showCategory').click(function(e) {
                    e.preventDefault(); // منع الانتقال إلى الرابط

                    // الحصول على category_id من data-attribute
                    var categoryId = $(this).data('category-id');

                    $.ajax({
                        url: '/category/show',
                        type: 'POST',
                        data: {
                            category_id: categoryId,
                            _token: $('meta[name="csrf-token"]').attr('content'), // إضافة CSRF token
                        },
                        success: function(response) {
                            // يمكنك هنا توجيه المستخدم إلى الصفحة المطلوبة
                            // مثال: window.location.href = '/desired-page';
                            alert(response.message); // عرض رسالة النجاح
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                });
            });
        </script>
    @endsection

@endsection
