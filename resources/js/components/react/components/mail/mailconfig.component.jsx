import React from "react";
import MainLayout from "../main/MainLayout.component";

const MailConfig = () => {
  return (
    <MainLayout>
      <div className="container-fluid">
        <div className="row d-flex justify-content-center">
          <div className="col-md-8">
            <form
              method="post"
              action="/admin/1/"
              encType="multipart/form-data"
            >
              @csrf
              <div className="row d-flex justify-content-center">
                <div className="col-md-8">
                  {" "}
                  <h6>Mailer In use *SMTP*</h6>
                </div>
                <div className="col-md-8 form-group">
                  <label htmlFor="email">Email</label>
                  <input
                    type="Email"
                    className="form-control"
                    id="email"
                    name="email"
                    required
                    defaultValue="{{env('MAIL_HOST')}}"
                  />
                </div>
                <div className="col-md-8 form-group">
                  <label htmlFor="password">Password</label>
                  <input
                    type="password"
                    className="form-control"
                    id="password"
                    name="password"
                    required
                  />
                </div>
                <div className="col-md-8 form-group">
                  <label htmlFor="host">Server | Host</label>
                  <input
                    type="text"
                    className="form-control"
                    id="host"
                    name="host"
                    required
                    defaultValue="{{env('MAIL_HOST')}}"
                  />
                </div>
                <div className="col-md-8 form-group">
                  <label htmlFor="port">Mail Port</label>
                  <input
                    type="number"
                    className="form-control"
                    id="port"
                    name="port"
                    defaultValue="{{env('MAIL_PORT')}}"
                    required
                  />
                </div>
                <div className="col-md-8 form-group">
                  <label htmlFor="encryption">Encryption</label>
                  <input
                    type="text"
                    className="form-control"
                    id="encryption"
                    name="encryption"
                    required
                    defaultValue="{{env('MAIL_ENCRYPTION')}}"
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
            </form>
          </div>
        </div>
      </div>

    </MainLayout>
  );
};

export default MailConfig;
