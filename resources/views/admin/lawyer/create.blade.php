@extends('layout.admin_panel.master')
@section('title')
Add Lawyer
@endsection
@push('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
@endpush
@section('content')
   <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-lg-row">
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid mb-10 mb-lg-0">
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card body-->
                            <div class="card-body p-12">
                                <div id="signup-embed"></div>
                                <script>
                                    var o_signup_options = {
                                        "id": "Outseta",
                                        "domain": "experts-gateway.outseta.com",
                                        "load": "auth",
                                        "auth": {
                                            "widgetMode": "register",
                                            "planFamilyUid": "A9345RW0",
                                            "skipPlanOptions": true,
                                            "id": "signup_embed",
                                            "mode": "embed",
                                            "selector": "#signup-embed"
                                        }
                                    };
                                </script>
                                <script src="https://cdn.outseta.com/outseta.min.js"
                                        data-options="o_signup_options">
                                </script>
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Layout-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection

@section('script')

@endsection
