<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">    
        <form method="POST" action="/note">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <input type="hidden" name="_method" value="PATCH">
            <div class="space-y-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8s">
                    <div class="col-span-full">
                        <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                        <div class="mt-2">
                            <textarea id="body"
                                      name="body"
                                      rows="3"  
                                      class="block w-full rounded-md border-0 py-1.5 
                                             text-gray-900 shadow-sm ring-1 ring-inset 
                                             ring-gray-300 placeholder:text-gray-400 
                                             focus:ring-2 focus:ring-inset focus:ring-indigo-600 
                                             sm:text-sm sm:leading-6"
                                      placeholder="Here's an idea for a note..."
                            ><?= $note['body'] ?? '' ?></textarea>

                            <?php if(isset($errors['body'])) :  ?>
                                <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                            <?php endif; ?>
                        </div>  
                    </div>

                    <div class="mt-6 flex items-center justify-start gap-x-4 justify-end">
                        <button type="button" 
                                class="text-red-500 mr-auto" 
                                onclick="document.querySelector('#delete-form').submit()">
                                Delete
                        </button>
                                
                        <a  href="/notes"
                            class="rounded-md bg-gray-500 
                                  px-3 py-2 text-sm font-semibold 
                                  text-white shadow-sm hover:bg-indigo-500 
                                  focus-visible:outline focus-visible:outline-2 
                                  focus-visible:outline-offset-2 
                                  focus-visible:outline-indigo-600">
                            Cancel
                        </a>                        
                        <button type="submit" 
                                class="rounded-md bg-indigo-600 
                                       px-3 py-2 text-sm font-semibold 
                                       text-white shadow-sm hover:bg-indigo-500 
                                       focus-visible:outline focus-visible:outline-2 
                                       focus-visible:outline-offset-2 
                                       focus-visible:outline-indigo-600">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <form id="delete-form" class="hidden" method="POST" action="/note">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
        </form>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
