import React from "react";
import MainLayout from "../main/MainLayout.component";

const BlogCreate = () => {
  return (
    <MainLayout>
      <div className="container-fluid">
        <div className="row d-flex">
          <div className="col">
            <ul className="nav nav-tabs" id="myTab" role="tablist">
              <li className="nav-item">
                <a
                  className="nav-link active"
                  id="home-tab"
                  data-toggle="tab"
                  href="#home"
                  role="tab"
                  aria-controls="home"
                  aria-selected="true"
                >
                  WYSIWYG Editor
                </a>
              </li>
              <li className="nav-item">
                <a
                  className="nav-link"
                  id="upload-tab"
                  data-toggle="tab"
                  href="#upload"
                  role="tab"
                  aria-controls="upload"
                  aria-selected="false"
                >
                  Blog Photo Upload
                </a>
              </li>
              <li className="nav-item">
                <a
                  className="nav-link"
                  id="seo-tab"
                  data-toggle="tab"
                  href="#seo"
                  role="tab"
                  aria-controls="seo"
                  aria-selected="false"
                >
                  SEO
                </a>
              </li>
              <li className="nav-item">
                <a
                  className="nav-link"
                  id="social-tab"
                  data-toggle="tab"
                  href="#social"
                  role="tab"
                  aria-controls="social"
                  aria-selected="false"
                >
                  Facebook &amp; Google Pixels
                </a>
              </li>
            </ul>
            @if(\Request::is('*edit'))
            <form
              method="post"
              action="/admin/blog/{{$content->id}}"
              encType="multipart/form-data"
            >
              @method('patch') @else @endif @csrf
              <div className="tab-content" id="myTabContent">
                <div
                  className="tab-pane fade show active mt-3 pt-3"
                  id="home"
                  role="tabpanel"
                  aria-labelledby="home-tab"
                >
                  <div className="form-group">
                    <label htmlFor="options-about text-danger">
                      *Blog title
                    </label>
                    <input
                      type="text"
                      className="form-control"
                      id="page"
                      name="page"
                      aria-describedby="Blog Title"
                      placeholder="What describes your post best"
                      defaultValue="{{$content->page ?? ''}}"
                      required
                    />
                  </div>
                  <textarea
                    className="form-control"
                    id="content"
                    name="content"
                    rows={50}
                    cols={50}
                    defaultValue={
                      "\t\t\t\t\t  \t\t{!!$content->content ?? '' !!}\n\t\t\t\t\t  \t"
                    }
                  />
                  <button
                    type="submit"
                    className="btn btn-success btn-md text-center"
                  >
                    Update
                  </button>
                </div>
                <div
                  className="tab-pane fade mt-3 pt-3"
                  id="upload"
                  role="tabpanel"
                  aria-labelledby="upload-tab"
                >
                  <div className="row d-flex justify-content-center">
                    <div className="col-md-7">
                      <img
                        style={{ maxHeight: 350 }}
                        className="img-responsive img-fluid rounded"
                      />
                    </div>
                    <div className="col-md">
                      <div className="custom-file">
                        <input
                          type="file"
                          className="custom-file-input"
                          id="image"
                          aria-describedby="inputGroupFileAddon01"
                          name="image"
                        />
                        <label
                          className="custom-file-label"
                          htmlFor="inputGroupFile01"
                        >
                          Choose Image
                        </label>
                      </div>
                      <button
                        type="submit"
                        className="btn btn-success btn-md text-center"
                      >
                        Update
                      </button>
                    </div>
                  </div>
                </div>
                <div
                  className="tab-pane fade mt-3 pt-3"
                  id="seo"
                  role="tabpanel"
                  aria-labelledby="seo-tab"
                >
                  <div className="form-group">
                    <label htmlFor="title">Page Title</label>
                    <input
                      type="text"
                      className="form-control"
                      id="page_title"
                      name="page_title"
                      aria-describedby="Page titke"
                      placeholder="What describes your page best"
                      defaultValue="{{$content->page_title ?? ''}}"
                    />
                  </div>
                  <div className="form-group">
                    <label htmlFor="description">Description</label>
                    <textarea
                      className="form-control"
                      id="page_description"
                      name="page_description"
                      rows={7}
                      cols={7}
                      defaultValue={
                        "\t\t\t\t\t\t    \t{{$content->description ?? ''}}\n\t\t\t\t\t\t    "
                      }
                    />
                  </div>
                  <button
                    type="submit"
                    className="btn btn-success btn-md text-center"
                  >
                    Submit
                  </button>
                </div>
                <div
                  className="tab-pane fade mt-3 pt-3"
                  id="social"
                  role="tabpanel"
                  aria-labelledby="social-tab"
                >
                  <div className="row d-flex justify-content-center">
                    <div className="col form-group">
                      <label htmlFor="description">
                        Facebook Advertising Pixel
                      </label>
                      <textarea
                        className="form-control"
                        id="description"
                        name="facebook"
                        rows={7}
                        cols={7}
                        defaultValue={
                          "\t\t\t\t\t\t\t    \t{{$content->facebook ?? ''}}\n\t\t\t\t\t\t\t    "
                        }
                      />
                    </div>
                    <div className="col form-group">
                      <label htmlFor="description">Google Analytics</label>
                      <textarea
                        className="form-control"
                        id="description"
                        name="google"
                        rows={7}
                        cols={7}
                        defaultValue={
                          "\t\t\t\t\t\t\t    \t{{$content->google ?? ''}}\n\t\t\t\t\t\t\t    "
                        }
                      />
                    </div>
                    <div className="col-md-12">
                      <button
                        type="submit"
                        className="btn btn-success btn-md text-center"
                      >
                        Submit
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </MainLayout>
  );
};

export default BlogCreate;
