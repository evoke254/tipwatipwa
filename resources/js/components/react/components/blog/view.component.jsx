import React from "react";
import MainLayout from "../main/MainLayout.component";

const BlogRead = () => {
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
                <i className=" ion-ios-add-circle-outline" /> Create a {"{"}
                {"{"}$moduleName{"}"}
                {"}"} post
              </a>
            </div>
          </div>
          <div className="row w-100">
            <div className="col-sm-6 col-md-12 col-lg-12">
              <div className="table-responsive">
                @foreach($fields as $field) @endforeach @foreach($contents as
                $content) @endforeach
                <table
                  id="kahakidt"
                  className="table table-striped table-hover"
                >
                  <thead>
                    <tr>
                      <th className="text-nowrap" scope="col">
                        {"{"}
                        {"{"}$field{"}"}
                        {"}"}
                      </th>
                      <th>Edit</th>
                      <th className="text-danger">Delete</th>
                    </tr>
                  </thead>
                  <tbody className="table-striped">
                    <tr>
                      <td width="75%">
                        {"{"}
                        {"{"} substr($content-&gt;page, 0, 150) {"}"}
                        {"}"}
                      </td>
                      <td>
                        {" "}
                        <a
                          href="/admin/{{$moduleName}}/{{$content->id}}/edit"
                          className="btn btn-sm btn-warning"
                        >
                          Edit
                        </a>
                      </td>
                      <td>
                        <form
                          action="/admin/{{$moduleName}}/{{$content->id}}"
                          method="post"
                        >
                          @csrf @method('delete')
                          <button
                            type="submit"
                            className="btn btn-danger px-2 btn-sm"
                          >
                            <i className="fas fa-trash" aria-hidden="true" />
                          </button>
                        </form>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </MainLayout>
  );
};

export default BlogRead;
