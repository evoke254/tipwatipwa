import React from "react";
import MainLayout from "../main/MainLayout.component";

const GalleryRead = () => {
  return (
    <MainLayout>
      <div className="content">
        <div
          className="container m-0 p-0"
          data-animation="true"
          data-animation-type="fadeInUp"
        >
          <div className="row d-flex justify-content-center">
            <div className="col-md-12">
              <a
                href="{{$moduleName}}/create"
                className="btn btn-sm btn-success"
              >
                <i className=" ion-ios-add-circle-outline" /> Add a {"{"}
                {"{"}$moduleName{"}"}
                {"}"}{" "}
              </a>
            </div>
          </div>
          <div className="row w-100 d-flex justify-content-center">
            @foreach($contents as $content)
            <div className="col-md-4 text-center">
              <img
                src="{{asset('storage'.$content->image)}}"
                className="z-depth-1 rounded img-responsive img-fluid"
                style={{ height: "6rem" }}
              />{" "}
              <br />
              <form
                action="/admin/{{$moduleName}}/{{$content->id}}"
                method="post"
              >
                @csrf @method('delete')
                <button
                  type="submit"
                  className="w-50 text-center btn btn-danger px-2 btn-sm"
                >
                  {" "}
                  Delete <i className=" ml-2 fas fa-trash" aria-hidden="true" />
                </button>
              </form>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </MainLayout>
  );
};

export default GalleryRead;
