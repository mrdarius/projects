package com.activity;


import service.EntryService;
import model.EntryListAdapter;

import android.app.Activity;
import android.app.ListActivity;
import android.os.Bundle;

public class EntriesActivity extends ListActivity {
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		
		setContentView(R.layout.entrieslist);
		
		refreshList();
		
		
	}

	private void refreshList() {
		
		EntryService es = new EntryService(this);		
		EntryListAdapter adapter = new EntryListAdapter(this, es.getAllEntries() );
		setListAdapter(adapter);		
		
	}
	
}
