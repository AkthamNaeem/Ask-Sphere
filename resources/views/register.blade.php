@extends('dashboard.app')

@section('style')

@endsection

@section('content')
    <div class="content-container">
        <div class="col-12 d-flex justify-content-center">
            <h1>Ask Sphere</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10 col-12 mt-5">
                <div class="form-container">
                    <h3 class="text-center mb-4">Register</h3>

                    <!-- رسالة تنبيه للنجاح أو الخطأ -->
                    <div class="alert alert-success" id="successMessage">User registered successfully!</div>
                    <div class="alert alert-danger" id="errorMessage"></div>

                    <form id="registerForm">
                        <div class="form-group mb-3">
                            <label for="exampleInputName">Full Name</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="Enter your name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputPassword">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword" placeholder="Enter password">
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleInputPasswordConfirmation">Password Confirmation</label>
                            <input type="password" class="form-control" id="exampleInputPasswordConfirmation" placeholder="Confirm password">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary" id="registerBtn">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection

        @section('script')
            <script>
                $(document).ready(function() {
                    // عند الضغط على زر التسجيل
                    $('#registerForm').on('submit', function(e) {
                        e.preventDefault(); // منع إعادة تحميل الصفحة

                        // الحصول على قيم المدخلات
                        let name = $('#exampleInputName').val();
                        let email = $('#exampleInputEmail').val();
                        let password = $('#exampleInputPassword').val();
                        let password_confirmation = $('#exampleInputPasswordConfirmation').val();

                        console.log({
                            name: name,
                            email: email,
                            password: password,
                            password_confirmation: password_confirmation
                        });

                        // الحصول على CSRF Token من Laravel
                        let token = $('meta[name="csrf-token"]').attr('content');

                        // إجراء طلب AJAX
                        $.ajax({
                            url: '/api/register', // رابط الـ API
                            type: 'POST', // نوع الطلب
                            body: {
                                _token: token, // CSRF Token
                                name: name,
                                email: email,
                                password: password,
                                password_confirmation: password_confirmation
                            },
                            success: function(response) {
                                // إذا كان التسجيل ناجحًا
                                $('#successMessage').show(); // عرض رسالة النجاح
                                $('#errorMessage').hide();   // إخفاء رسالة الخطأ

                                // حفظ الـ token في الـ headers لاستخدامه لاحقًا
                                let userToken = response.token;
                                localStorage.setItem('auth_token', userToken);

                                // إعداد الـ header مع الـ token في الطلبات القادمة
                                $.ajaxSetup({
                                    headers: {
                                        'Authorization': 'Bearer ' + localStorage.getItem('data.token')
                                    }
                                });

                                // إعادة توجيه المستخدم إلى الصفحة الرئيسية
                                window.location.href = "/home";
                            },
                            error: function(xhr, status, error) {
                                // عرض الأخطاء إن وجدت
                                let errorMessage = xhr.responseJSON.message || 'An error occurred.';
                                $('#errorMessage').text(errorMessage).show(); // عرض رسالة الخطأ
                                $('#successMessage').hide(); // إخفاء رسالة النجاح
                                console.log('Error:', errorMessage);
                            }
                        });
                    });
                });
            </script>
@endsection
