
## About Helper UploaderFile laravel

Easy to use in any project.


### import the class into the controller

```php
    use App\Helpers\UploaderFile;
```

### store method

```php
    $file = null;
        if ($bookRequest->hasFile('file'))
        {
            $file = Uploader::uploadFile('file', 'books-pdf');
        }
```

#### update method

```php
    $file = $book->file;
        if ($bookRequest->hasFile('file'))
        {
            if ($book->file)
            {
                Uploader::removeFile("books-pdf", $book->file);
            }
                $file = Uploader::uploadFile('file', 'books-pdf');
        }
```

## License

The Helper UploaderFile laravel framework is open-sourced software licensed under the [Apache License](https://opensource.org/licenses/Apache-2.0).
