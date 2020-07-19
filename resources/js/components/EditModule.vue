<template>
    <div class="content">      
        <form method="POST" :action="'/admin/'+requestparams.moduleName+'/'+requestparams.moduleData['id']" enctype="multipart/form-data">
            <input type="hidden" name="_token" v-bind:value="csrf">
            <input type="hidden" name="_method" value="patch">
            <div class="row">           
                <div v-for="(field, type) in requestparams.fields" class="col-md-6">
                    <label class="col-form-label col-md-3">{{field}} </label>
                    <div class="col">
                        <datetimepicker v-if="type.includes('date')" 
                          class="form-control border border-light" 
                          :name="field" 
                          v-bind:value="requestparams.moduleData[field]">
                          
                        </datetimepicker>
                         <textarea v-else-if="type.includes('text')" 
                            class=" col-md-12 form-control rounded-4 border border-light"  
                            rows="5" :name="field" 
                            required="" 
                            v-bind:value="requestparams.moduleData[field]">
                          </textarea>
                        <model-select 
                                v-else-if="type.includes('big')" 
                                class="form-control border border-light"
                                :name="field"
                                placeholder="Drop and search"
                                required>
                        </model-select>
                        <input v-else-if="type.includes('string')" 
                          class="form-control border border-light" 
                        type="text" 
                        required="" 
                        :name="field"
                        v-bind:value="requestparams.moduleData[field]" 
                            >

                        <div v-else-if="type.includes('file')" class="custom-file hoverable rounded">
                            <input type="file" class="custom-file-input" id="image"
                              aria-describedby="inputGroupFileAddon01" :name="field">
                            <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>

                          <p class="text-danger mt-3">
                            Jambo, to change the above image, please select a new image from your computer and click update. 
                          </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-b-15 justify-content-center text-center">
                <div class="form-group row mb-5 ">
                    <button type="submit" class="btn btn-md btn-success">Add | Create</button>
                </div>
            </div>
        </form>
        <div class="modal fade" id="alertSuccessModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
            <div class="modal-dialog modal-sm modal-notify modal-success" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title w-100 text-center" id="myModalLabel">Success</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                   <div class="text-center">
                    <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                    <h6 id="controllerSuccess">Well Done. Wasn't that easy. Looking forward to creating more</h6>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
        </div>
    </div>
</template>

<script>

import 'vue-search-select/dist/VueSearchSelect.css';
import { ModelSelect } from 'vue-search-select';
  export default {
    props: ['csrf', 'requestparams', 'moduleData'],
    mounted() {
      this.id = this.requestparams['moduleData']['id'];
    },
    data () {
      return { 
        id :''      
        }
    },

    components: {
      ModelSelect
    },

  }
</script> 