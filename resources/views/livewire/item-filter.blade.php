<!-- Sidebar Filter UI -->
<!-- Your filter UI elements here -->

<!-- Display Filtered Items -->
<div class="items-list">
    @foreach($filteredItems as $item)
        <div class="item">
            <!-- Display item details -->
            <p>{{ $item->course }}</p>
            <p>{{ $item->marks10}}</p>
            <p>{{ $item->marks12}}</p>
            <p>{{ $item->cgpa}}</p>
            <!-- Add more item details as needed -->
        </div>
    @endforeach
</div>

