package com.example.campusconnect;

import android.content.Intent;
import android.os.Bundle;
import android.view.MenuItem;
import androidx.annotation.NonNull;
import androidx.appcompat.app.ActionBarDrawerToggle;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import androidx.core.view.GravityCompat;
import androidx.drawerlayout.widget.DrawerLayout;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import com.google.android.material.navigation.NavigationView;

public class MainActivity extends AppCompatActivity implements NavigationView.OnNavigationItemSelectedListener {
    DrawerLayout drawerLayout;
    NavigationView navigationView;
    Toolbar toolbar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        drawerLayout = findViewById(R.id.drawer_layout);
        navigationView = findViewById(R.id.nav_view);
        toolbar = findViewById(R.id.toolbar);

        setSupportActionBar(toolbar);

        // Set up the NavigationView's listener
        navigationView.setNavigationItemSelectedListener(this);
        navigationView.bringToFront();
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(this, drawerLayout, toolbar, R.string.open_nav, R.string.close_nav);
        drawerLayout.addDrawerListener(toggle);
        toggle.syncState();

        // Set Home as the default selected item and display its content
        if (savedInstanceState == null) {
            navigationView.setCheckedItem(R.id.nav_home);
            clearAllFragments(); // Ensure default content is shown when activity starts
        }
    }

    @Override
    public boolean onNavigationItemSelected(@NonNull MenuItem item) {
        Fragment selectedFragment = null;
        int itemId = item.getItemId();

        if (itemId == R.id.nav_home) {
            clearAllFragments();
        } else if (itemId == R.id.nav_ongoing_eve) {
            selectedFragment = new OngoingEventFragment();
        } else if (itemId == R.id.nav_upcoming_eve) {
            selectedFragment = new UpcomingEventsFragment();
        } else if (itemId == R.id.nav_archieved_eve) {
            selectedFragment = new ArchivedEventsFragment();
        } else if (itemId == R.id.nav_about) {
            selectedFragment = new AboutFragment();
        } else if (itemId == R.id.nav_logout) {
            Intent intent = new Intent(this, LoginActivity.class);
            startActivity(intent);
            finish();
        }

        if (selectedFragment != null) {
            replaceFragment(selectedFragment);
        }

        drawerLayout.closeDrawer(GravityCompat.START);
        return true;
    }

    private void clearAllFragments() {
        FragmentManager fragmentManager = getSupportFragmentManager();
        for (Fragment fragment : fragmentManager.getFragments()) {
            if (fragment != null) {
                fragmentManager.beginTransaction().remove(fragment).commit();
            }
        }
    }

    private void replaceFragment(Fragment fragment) {
        getSupportFragmentManager().beginTransaction()
            .replace(R.id.fragment_container, fragment)
            .commit();
    }
}
