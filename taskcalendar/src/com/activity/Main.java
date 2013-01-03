package com.activity;



import java.util.Calendar;


import model.MonthView;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.Toast;

public class Main extends Activity {
    
	private View menu;
	private View app;
	private ImageView btnSlide;
	private Intent i;

	@Override
	  public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        
//        One way to use the calendar widget is putting it in the xml file is shown in main.xml
//        setContentView(R.layout.main);

        /*
         Other way is to add is using the java code as follows.
		*/
        MonthView mv = new MonthView(this);
             
        ////////////                
        ////////        
        
        
        setContentView(mv);
        
//        Calendar cal = Calendar.getInstance();
//        cal.set(2012, Calendar.DECEMBER,12);
//        mv.GoToDate(cal.getTime());
    }  
	
	public boolean onCreateOptionsMenu(Menu menu) {
	      MenuInflater inflater = getMenuInflater();
	      inflater.inflate(R.menu.options_menu, menu);
	      return true;
	    }
	public boolean onOptionsItemSelected(MenuItem item) {
	      switch (item.getItemId()) {
	      case R.id.sync:
	    	  
	    	  i = new Intent(this, DBActivity.class);				
			  startActivity(i);
				
	            return true;
	      case R.id.list:
	    	  i = new Intent(this, EntriesActivity.class);				
			  startActivity(i);
	    	  
	    	  return true;  
	    	  
	     case R.id.refresh:
	    	 finish();
	    	 startActivity(getIntent());	    	  
	    	  return true;  
	      
	      default:
	            return super.onOptionsItemSelected(item);
	      }
	   }
}